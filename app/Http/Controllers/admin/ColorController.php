<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

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
        Session::forget('update');
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

    public function destroy(Color $color)
    {
        $color->delete();
        return back();
    }
    public function update_form(Color $color)
    {
        Session::flash("update", [
            "id" => $color->id,
            "name" => $color->name,
            "code" => $color->code
        ]);
        return view('admin.auth.form.color');
    }
    public function update(Request $request, Color $color)
    {
        // validate 
        $request->validate([
            "name" => [
                "required",
                Rule::unique('colors', 'name')
                    ->ignore($color->id)
            ],
            "code" => [
                "required",
                "regex:/^#([A-Fa-f0-9]{6})$/",
                Rule::unique('colors', 'code')
                    ->ignore($color->id)
            ]
        ]);
        $input = $request->only(['name',  'code']);
        $color->fill($input);
        if ($color->isDirty()) {
            DB::beginTransaction();
            $color->update($input);
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
