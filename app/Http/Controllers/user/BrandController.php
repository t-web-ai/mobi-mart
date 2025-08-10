<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::with(['devices.device_variants' => function ($query) {
            $query
                ->orderByDesc('created_at')
                ->limit(3)
                ->with([
                    'color',
                    'device_variant_images' => function ($q) {
                        $q->where('is_main', true);
                    }
                ]);
        }])
            ->orderByDesc('name')
            ->get();

        return view('user.auth.view.collection', [
            "brands" => $brands
        ]);
    }
}
