<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeviceVariant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.guest");
    }
    public function dashboard()
    {
        $products = $this->format(DeviceVariant::count());
        $users = $this->format(User::count());
        $orders = $this->format(Order::count());
        $sales = $this->format(Order::sum('total_price'));
        return view("admin.auth.manage.dashboard", [
            "products" => $products,
            "users" => $users,
            "orders" => $orders,
            "sales" => $sales
        ]);
    }
    private function format(float $amount): string
    {
        if ($amount >= 1000000000) return number_format($amount / 1000000000, 1) . 'B+';
        if ($amount >= 1000000) return number_format($amount / 1000000, 1) . 'M+';
        if ($amount >= 1000) return number_format($amount / 1000, 1) . 'K+';
        return number_format($amount, 0);
    }
    public function setting()
    {
        return view("admin.auth.manage.setting");
    }
}
