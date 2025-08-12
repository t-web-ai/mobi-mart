<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->with([
            'device_variants' => function ($q) {
                $q->with([
                    'device_variant_images' => function ($q) {
                        $q->where('is_main', true);
                    },
                    'device',
                    'color',
                    'device_variant_orders'
                ]);
            }, 'device_variant_orders'
        ])->get();
        return view('user.order.index', [
            "orders" => $orders
        ]);
    }

    public function order()
    {
    }
}
