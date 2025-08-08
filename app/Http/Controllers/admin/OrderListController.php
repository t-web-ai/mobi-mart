<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeviceVariantOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->query('date');
        $status = $request->query('status');
        $filter = $request->query('filter');
        $search = $request->query('q');
        $orders = Order::with('device_variants.device', 'device_variant_orders', 'user')
            ->when($filter == "username", function ($q) use ($search) {
                $q->whereHas('user', function ($query) use ($search) {
                    $query->where("name", "like", "%$search%");
                });
            })
            ->when($filter == "device", function ($q) use ($search) {
                $q->whereHas('device_variants.device', function ($query) use ($search) {
                    $query->where("name", "like", "%$search%");
                });
            })
            ->when($date, function ($q) use ($date) {
                $q->whereDate("created_at", $date);
            })
            ->when($status, function ($q) use ($status) {
                $q->where("status", $status);
            })
            ->paginate(10)
            ->appends([
                'q' => $request->query('q'),
                'filter' => $request->query('filter'),
                'status' => $status,
                'date' => $date
            ]);
        return view("admin.auth.manage.orders", [
            "orders" => $orders
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
        return view("admin.auth.manage.sales");
    }
    public function popular()
    {
        return view("admin.auth.manage.popular");
    }
}
