<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DeviceVariant;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function details(DeviceVariant $variant)
    {
        $details =  $variant->load(['device', 'device_variant_images', 'color']);
        return view('components.auth.user.details.details', [
            "variant" => $details
        ]);
    }

    public function index(Request $request)
    {
        $brand = $request->brand;
        $search = $request->q;
        $variants = DeviceVariant::with([
            'device.brand',
            'color',
            'device_variant_images' => function ($q) {
                $q->where('is_main', true);
            }
        ])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('device', function ($q) use ($search) {
                    $q->where("name", "like", "%$search%");
                });
            })
            ->when($brand, function ($query) use ($brand, $search) {
                $query->whereHas('device.brand', function ($q) use ($brand) {
                    $q->where('id', $brand);
                });

                if ($search) {
                    $query->whereHas('device', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
                }
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->appends([
                'brand' => $brand,
                'q' => $search
            ]);
        return view('user.auth.view.latest', [
            "variants" => $variants
        ]);
    }
}
