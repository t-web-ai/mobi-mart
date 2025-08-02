<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // validate 
        $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:8"]
        ]);
        // authenticate 
        $cred = $request->only(['email', 'password']);
        if (!Auth::guard('admin')->attempt($cred)) {
            throw ValidationException::withMessages([
                'authentication' => "Oops! That email or password didn't match. Try again."
            ]);
        }
        // redirect 
        return redirect(route("admin.dashboard"))->with([
            "authentication" => "You are now logged in!"
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.index'));
    }
}
