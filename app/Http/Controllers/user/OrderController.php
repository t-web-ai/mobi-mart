<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\DeviceVariant;
use App\Models\DeviceVariantOrder;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function form()
    {
        return view('user.form.order');
    }

    public function order(Request $request)
    {
        // validate 
        $request->validate([
            "shipping_address" => ["required", "string"],
            "payment" => ["required", "in:KPay,Wave,Cash On Delivery"]
        ]);

        // get user and cart
        $user = auth()->user();
        $cart = Session::get('cart');

        // check if cart is empty or not 
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // database 
        DB::beginTransaction();

        try {
            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'total_price' => 0, // calculate after
                'shipping_address' => $request->input('shipping_address'),
                'payment' => $request->input('payment')
                // add other fields like payment info
            ]);

            $totalPrice = 0;

            foreach ($cart as $variantId => $item) {
                $variant = DeviceVariant::find($variantId);
                if (!$variant || $variant->stock < $item['quantity']) {
                    throw new Exception('Stock not sufficient for variant ' . $item['name'] . ' (' . $item['color']['name'] . ') ' . $item['ram'] . "/" . $item['storage']);
                }

                // Save order items
                DeviceVariantOrder::create([
                    'order_id' => $order->id,
                    'device_variant_id' => $variantId,
                    'quantity' => $item['quantity'],
                    'price' => $variant->price,
                ]);

                // Reduce stock
                $variant->stock -= $item['quantity'];
                $variant->save();

                $totalPrice += $variant->price * $item['quantity'];
            }

            // Update total price in order
            $order->total_price = $totalPrice;
            $order->save();

            DB::commit();

            // Clear cart
            Session::forget('cart');

            return redirect()->route('orders.view', $order->id)->with('success', 'Order placed successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function cancel(Order $order)
    {
        $order->status = "cancelled";
        $order->save();
        return back();
    }
}
