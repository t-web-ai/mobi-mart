<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index()
    {
        return view("admin.auth.manage.orders");
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
