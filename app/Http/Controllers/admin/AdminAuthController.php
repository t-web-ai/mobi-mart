<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function change_password(Request $request)
    {
        // validate 
        $request->validate([
            "old" => ["required", "string", "min:8"],
            "password" => ["required", "string", "min:8", "different:old"]
        ]);
        // update 
        $admin = Auth::guard('admin')->user();
        if (!Hash::check($request->old, $admin->password)) {
            throw ValidationException::withMessages([
                "error" => "Fill the correct password"
            ]);
        }
        $auth = Admin::find($admin->id);
        $auth->update([
            "password" => $request->password
        ]);
        return back()->with([
            "success" => "Successfully updated your password"
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.index'));
    }
}
