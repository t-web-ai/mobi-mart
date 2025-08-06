<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Device;
use App\Models\DeviceVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
    public function index()
    {
        $devices = DeviceVariant::with(['device.brand', 'color'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view("admin.auth.manage.products", [
            "devices" => $devices,
            "brands" => Brand::all()
        ]);
    }

    public function brand_devices(Brand $brand)
    {
        $id = $brand->devices()->pluck('id');
        $devices = DeviceVariant::whereIn("device_id", $id)
            ->with(['device.brand', 'color'])
            ->paginate(10);

        return view("admin.auth.manage.products", [
            "devices" => $devices,
            "brands" => Brand::all(),
            "brand" => $brand
        ]);
    }

    public function products_search(Request $request)
    {
        $request->validate([
            "q" => ["required"]
        ]);
        $q = $request->query('q');
        $id = Device::where("name", "like", "%$q%")->pluck("id");
        $devices = DeviceVariant::whereIn("device_id", $id)
            ->with(['device.brand', 'color'])
            ->paginate(10)
            ->appends(['q' => $q]);
        return view("admin.auth.manage.products", [
            "devices" => $devices,
            "brands" => Brand::all()
        ]);
    }
    public function products_brands_search(Request $request, Brand $brand)
    {
        $request->validate([
            "q" => ["required"]
        ]);
        $q = $request->query('q');
        $id = $brand
            ->devices()
            ->where("name", "like", "%$q%")
            ->pluck("id");
        $devices = DeviceVariant::whereIn("device_id", $id)
            ->with(['device.brand', 'color'])
            ->paginate(10)
            ->appends(['q' => $q]);
        return view("admin.auth.manage.products", [
            "devices" => $devices,
            "brands" => Brand::all(),
            "brand" => $brand
        ]);
    }

    public function add_variant_view()
    {
        return view('admin.auth.form.variant', [
            "devices" => Device::all(),
            "colors" => Color::all()
        ]);
    }
    public function add_variant(Request $request)
    {
        // validate 
        $request->validate([
            "brand" => ["required", "exists:brands,id", "numeric", "min:0"],
            "color" => ["required", "exists:colors,id", "numeric", "min:0"],
            "ram" => ["required", "string"],
            "storage" => ["required", "string"],
            "price" => ["required", "numeric", "min:0"],
            "discount" => ["required", "numeric", "min:0"],
            "stock" => ["required", "numeric", "min:0"]
        ]);

        // store 
        DB::beginTransaction();
        DeviceVariant::create([
            'device_id' => $request->input('brand'),
            'color_id' => $request->input('color'),
            'ram' => $request->input('ram'),
            'storage' => $request->input('storage'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'stock' => $request->input('stock')
        ]);
        DB::commit();

        // redirect 
        return back()->with([
            'success' => 'Successfully added the new variant'
        ]);
    }
}
