<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.guest");
    }
    public function dashboard()
    {
        return view("admin.auth.manage.dashboard");
    }
    public function setting()
    {
        return view("admin.auth.manage.setting");
    }
}
