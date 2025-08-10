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
}
