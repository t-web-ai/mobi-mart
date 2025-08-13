<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.form.profile');
    }

    public function update(Request $request)
    {
        // validate 
        $request->validate([
            "name" => ["required", Rule::unique('users', 'name')->ignore(Auth::user()->id)],
            "email" => ["required", "email", Rule::unique('users', "email")->ignore(Auth::user()->id)],
            "phone" => ["required", "regex:/^09\d{9}$/", Rule::unique('users', 'phone')->ignore(Auth::user()->id)],
            "address" => ["required", "string", "max:255"]
        ]);

        $input = $request->only(['name', 'email', 'phone', 'address']);
        $user = Auth::user();
        /** @var \App\Models\User $user */
        $user->fill($input);
        if ($user->isDirty()) {
            DB::beginTransaction();
            $user->update($input);
            DB::commit();
            return back()->with([
                'success' => 'Successfully updated'
            ]);
        } else {
            return back()->with([
                'success' => 'No changes'
            ]);
        }
    }
}
