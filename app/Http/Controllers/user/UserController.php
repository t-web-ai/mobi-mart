<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function login_view()
    {
        return view('user.form.login');
    }
    public function login(Request $request)
    {
        // validate 
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // authenticate  
        $cred = $request->only(['email', 'password']);
        if (!Auth::attempt($cred)) {
            throw ValidationException::withMessages([
                "authentication" => "These credentials do not match our records."
            ]);
        }

        // redirect 
        $request->session()->regenerate();
        return redirect(route('user'));
    }

    public function register_view()
    {
        return view('user.form.register');
    }
    public function register(Request $request)
    {
        // validate 
        $request->validate([
            'name' => ['required', 'string', 'unique:users,name', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'regex:/^09\d{9}$/'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // store 
        $info = $request->only(['name', 'email', 'phone', 'address', 'password']);
        $user = User::create($info);
        Auth::login($user);
        $request->session()->regenerate();

        // redirect 
        return redirect(route('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect(route('user'));
    }
}
