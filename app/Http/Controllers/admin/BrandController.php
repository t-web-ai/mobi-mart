<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

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
        Session::forget('update');
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

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back();
    }
    public function update_form(Brand $brand)
    {
        Session::flash("update", [
            "id" => $brand->id,
            "name" => $brand->name
        ]);
        return view('admin.auth.form.brand');
    }
    public function update(Request $request, Brand $brand)
    {
        // validate 
        $request->validate([
            "name" => [
                "required",
                Rule::unique('brands', 'name')
                    ->ignore($brand->id)
            ]
        ]);
        $input = $request->only(['name']);
        $brand->fill($input);
        if ($brand->isDirty()) {
            DB::beginTransaction();
            $brand->update($input);
            DB::commit();
            return back()->with([
                'success' => 'Successfully updated'
            ]);
        }
        return back()->with([
            'success' => 'No changes'
        ]);
    }
}
