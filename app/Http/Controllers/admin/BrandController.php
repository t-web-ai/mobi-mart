<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy("created_at", "desc")
            ->paginate(10);
        return view('admin.auth.manage.products.brands', [
            "brands" => $brands
        ]);
    }
    public function search(Request $request)
    {
        $q = $request->query("q");
        //search
        $brands = Brand::where("name", "like", "%$q%")
            ->orderBy("created_at", "desc")
            ->paginate(10)
            ->appends(["q" => $q]);

        // return data 
        return view('admin.auth.manage.products.brands', [
            "brands" => $brands
        ]);
    }

    public function form()
    {
        return view('admin.auth.form.brand');
    }
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => ['required', 'unique:brands,name', 'string', 'max:255']
        ]);

        // store
        DB::beginTransaction();
        Brand::create([
            'name' => $request->input('name')
        ]);
        DB::commit();

        // redirect
        return back()->with([
            'success' => 'Successfully added the new brand'
        ]);
    }
}
