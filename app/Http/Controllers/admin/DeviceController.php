<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::orderBy("created_at", "desc")
            ->with(['brand', 'category'])
            ->paginate(10);
        return view('admin.auth.manage.products.devices', [
            "devices" => $devices
        ]);
    }
    public function search(Request $request)
    {
        $q = $request->query("q");
        //search
        $devices = Device::where("name", "like", "%$q%")
            ->with(['brand', 'category'])
            ->orderBy("created_at", "desc")
            ->paginate(10)
            ->appends(["q" => $q]);

        // return data 
        return view('admin.auth.manage.products.devices', [
            "devices" => $devices
        ]);
    }

    public function form()
    {
        Session::forget('update');
        return view('admin.auth.form.device', [
            "brands" => Brand::all(),
            "categories" => Category::all()
        ]);
    }
    public function store(Request $request)
    {
        // validate 
        $request->validate([
            "brand" => ["required", "exists:brands,id", "numeric"],
            "category" => ["required", "exists:categories,id", "numeric"],
            "name" => ["required", "unique:devices,name", "string"],
            "network" => ["required", "string"],
            "release" => ["required", "date_format:Y-m-d"],
            "description" => ["required", "string"],
            "dimensions" => ["required", "string"],
            "weight" => ["required", "string"],
            "build" => ["required", "string"],
            "sim" => ["required", "string"],
            "type" => ["required", "string"],
            "size" => ["required", "string"],
            "resolution" => ["required", "string"],
            "os" => ["required", "string"],
            "chipset" => ["required", "string"],
            "cpu" => ["required", "string"],
            "gpu" => ["required", "string"],
            "slot" => ["required", "string"],
            "mcamera" => ["required", "string"],
            "scamera" => ["required", "string"],
            "jack" => ["required", "in:Yes,No"],
            "nfc" => ["required", "in:Yes,No"],
            "wlan" => ["required", "string"],
            "bluetooth" => ["required", "string"],
            "positioning" => ["required", "string"],
            "radio" => ["required", "string"],
            "usb" => ["required", "string"],
            "sensors" => ["required", "string"],
            "battery" => ["required", "string"],
            "charging" => ["required", "string"]
        ]);

        // store
        DB::beginTransaction();
        Device::create([
            'brand_id' => $request->input('brand'),
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'network' => $request->input('network'),
            'release_date' => $request->input('release'),
            'dimensions' => $request->input('dimensions'),
            'weight' => $request->input('weight'),
            'build' => $request->input('build'),
            'sim' => $request->input('sim'),
            'screen_type' => $request->input('type'),
            'screen_size' => $request->input('size'),
            'resolution' => $request->input('resolution'),
            'os' => $request->input('os'),
            'chipset' => $request->input('chipset'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
            'card_slot' => $request->input('slot'),
            'main_camera' => $request->input('mcamera'),
            'selfie_camera' => $request->input('scamera'),
            'jack' => $request->input('jack'),
            'wlan' => $request->input('wlan'),
            'bluetooth' => $request->input('bluetooth'),
            'positioning' => $request->input('positioning'),
            'nfc' => $request->input('nfc'),
            'radio' => $request->input('radio'),
            'usb' => $request->input('usb'),
            'sensors' => $request->input('sensors'),
            'battery' => $request->input('battery'),
            'charging' => $request->input('charging')
        ]);
        DB::commit();

        // redirect
        return back()->with([
            'success' => 'Successfully added the new device'
        ]);
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return back();
    }
    public function update_form(Device $device)
    {
        Session::flash("update", [
            "id" => $device->id,
            "brand" => $device->brand_id,
            "category" => $device->category_id,
            "name" => $device->name,
            "network" => $device->network,
            "release" => $device->release_date,
            "description" => $device->description,
            "dimensions" => $device->dimensions,
            "weight" => $device->weight,
            "build" => $device->build,
            "sim" => $device->sim,
            "type" => $device->screen_type,
            "size" => $device->screen_size,
            "resolution" => $device->resolution,
            "os" => $device->os,
            "chipset" => $device->chipset,
            "cpu" => $device->cpu,
            "gpu" => $device->gpu,
            "slot" => $device->card_slot,
            "mcamera" => $device->main_camera,
            "scamera" => $device->selfie_camera,
            "jack" => $device->jack,
            "nfc" => $device->nfc,
            "wlan" => $device->wlan,
            "bluetooth" => $device->bluetooth,
            "positioning" => $device->positioning,
            "radio" => $device->radio,
            "usb" => $device->usb,
            "sensors" => $device->sensors,
            "battery" => $device->battery,
            "charging" => $device->charging
        ]);
        return view('admin.auth.form.device', [
            "brands" => Brand::all(),
            "categories" => Category::all()
        ]);
    }
    public function update(Request $request, Device $device)
    {
        // validate 
        $request->validate([
            "brand" => ["required", "exists:brands,id", "numeric"],
            "category" => ["required", "exists:categories,id", "numeric"],
            "name" => [
                "required",
                Rule::unique("devices", "name")
                    ->ignore($device->id), "string"
            ],
            "network" => ["required", "string"],
            "release" => ["required", "date_format:Y-m-d"],
            "description" => ["required", "string"],
            "dimensions" => ["required", "string"],
            "weight" => ["required", "string"],
            "build" => ["required", "string"],
            "sim" => ["required", "string"],
            "type" => ["required", "string"],
            "size" => ["required", "string"],
            "resolution" => ["required", "string"],
            "os" => ["required", "string"],
            "chipset" => ["required", "string"],
            "cpu" => ["required", "string"],
            "gpu" => ["required", "string"],
            "slot" => ["required", "string"],
            "mcamera" => ["required", "string"],
            "scamera" => ["required", "string"],
            "jack" => ["required", "in:Yes,No"],
            "nfc" => ["required", "in:Yes,No"],
            "wlan" => ["required", "string"],
            "bluetooth" => ["required", "string"],
            "positioning" => ["required", "string"],
            "radio" => ["required", "string"],
            "usb" => ["required", "string"],
            "sensors" => ["required", "string"],
            "battery" => ["required", "string"],
            "charging" => ["required", "string"]
        ]);
        $input = [
            'brand_id' => $request->input('brand'),
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'network' => $request->input('network'),
            'release_date' => $request->input('release'),
            'dimensions' => $request->input('dimensions'),
            'weight' => $request->input('weight'),
            'build' => $request->input('build'),
            'sim' => $request->input('sim'),
            'screen_type' => $request->input('type'),
            'screen_size' => $request->input('size'),
            'resolution' => $request->input('resolution'),
            'os' => $request->input('os'),
            'chipset' => $request->input('chipset'),
            'cpu' => $request->input('cpu'),
            'gpu' => $request->input('gpu'),
            'card_slot' => $request->input('slot'),
            'main_camera' => $request->input('mcamera'),
            'selfie_camera' => $request->input('scamera'),
            'jack' => $request->input('jack'),
            'wlan' => $request->input('wlan'),
            'bluetooth' => $request->input('bluetooth'),
            'positioning' => $request->input('positioning'),
            'nfc' => $request->input('nfc'),
            'radio' => $request->input('radio'),
            'usb' => $request->input('usb'),
            'sensors' => $request->input('sensors'),
            'battery' => $request->input('battery'),
            'charging' => $request->input('charging')
        ];
        $device->fill($input);
        if ($device->isDirty()) {
            DB::beginTransaction();
            $device->update($input);
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
