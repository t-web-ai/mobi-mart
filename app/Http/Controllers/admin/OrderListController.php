<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceVariant;
use App\Models\DeviceVariantOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderListController extends Controller
{
    public function index(Request $request)
    {
        Session::forget('update');
        $date = $request->date;
        $status = $request->status;
        $brand = $request->brand;
        $search = $request->q;
        Session::flash("update", [
            "brand" => $brand
        ]);
        $orders = Order::with('device_variants.device', 'device_variants.device_variant_orders', 'device_variant_orders', 'user')
            ->when($brand, function ($q) use ($brand) {
                $q->whereHas('device_variants', function ($q) use ($brand) {
                    $q->where('device_id', $brand);
                });
            })
            ->when($search, function ($q) use ($search) {
                $q->whereHas("user", function ($q) use ($search) {
                    $q->where("name", "like", "%$search%");
                });
            })
            ->when($date, function ($q) use ($date) {
                $q->whereDate("created_at", $date);
            })
            ->when($status, function ($q) use ($status) {
                $q->where("status", $status);
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->appends([
                'q' => $search,
                'brand' => $brand,
                'status' => $status,
                'date' => $date
            ]);
        return view("admin.auth.manage.orders", [
            "orders" => $orders,
            "devices" => Device::all(),
            "q" => $search,
            "brand" => $brand,
            "status" => $status,
            "date" => $date
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }
    public function confirm(Order $order)
    {
        $order->status = "confirmed";
        $order->save();
        return back();
    }

    public function sales()
    {
        $sale = DeviceVariantOrder::sum('quantity');
        $order = Order::count('id');
        $total = Order::where('status', 'confirmed')->sum('total_price');
        return view("admin.auth.manage.sales", [
            'sale' => $sale,
            'order' => $order,
            'total' => $total
        ]);
    }
    public function popular()
    {
        $variant = DeviceVariantOrder::with('device_variant')->get();
        $popular = $variant->groupBy('device_variant_id')
            ->map(function ($item) {
                return [
                    "id" => $item->first()->device_variant_id,
                    "device" => DeviceVariant::find($item->first()->device_variant_id)?->device->name,
                    "ram" => DeviceVariant::find($item->first()->device_variant_id)?->ram,
                    "storage" => DeviceVariant::find($item->first()->device_variant_id)?->storage,
                    "quantity" => $item->sum('quantity'),
                    "sale" => $item->sum('price') * $item->sum('quantity')
                ];
            })
            ->filter(function ($item) {
                if (DeviceVariant::find($item["id"])) return $item;
            })
            ->sortByDesc(['quantity', 'sale']);
        return view("admin.auth.manage.popular", [
            "devices" => $popular
        ]);
    }
}
