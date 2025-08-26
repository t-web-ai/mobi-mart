<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DeviceVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('user.cart.index', compact('cart'));
    }

    public function store(DeviceVariant $product)
    {
        // Session::forget('cart');
        // return;
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            // $cart[$product->id]['price'] = $product->price;
            // $cart[$product->id]['color'] = $product->color;
        } else {
            $cart[$product->id] = [
                'variant_id' => $product->id,
                'name' => $product->device->name,
                'ram' => $product->ram,
                'storage' => $product->storage,
                'color' => $product->color,
                'quantity' => 1,
                // 'image' => $product->device_variant_images->where('is_main', true),
                // 'price' => $product->price,
                'info' => $product
            ];
        }
        Session::put('cart', $cart);
        return back();
    }

    public function remove(DeviceVariant $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']--;

            if ($cart[$product->id]['quantity'] <= 0) {
                unset($cart[$product->id]);
            }
            Session::put('cart', $cart);
        }

        return back();
    }

    public function destroy(DeviceVariant $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }
        return back();
    }
}
