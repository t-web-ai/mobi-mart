<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy("created_at", "desc")
            ->paginate(10);
        return view('admin.auth.manage.products.colors', [
            "colors" => $colors
        ]);
    }
    public function search(Request $request)
    {
        $q = $request->query("q");
        //search
        $colors = Color::where("name", "like", "%$q%")
            ->orderBy("created_at", "desc")
            ->paginate(10)
            ->appends(["q" => $q]);

        // return data 
        return view('admin.auth.manage.products.colors', [
            "colors" => $colors
        ]);
    }

    public function form()
    {
        return view('admin.auth.form.color');
    }
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => ['required', 'unique:colors,name', 'string', 'max:255'],
            'code' => ['required', 'regex:/^#([A-Fa-f0-9]{6})$/'],
        ]);

        // store
        DB::beginTransaction();
        Color::create([
            'name' => $request->input('name'),
            'code' => $request->input('code')
        ]);
        DB::commit();

        // redirect
        return back()->with([
            'success' => 'Successfully added the new color'
        ]);
    }
}
