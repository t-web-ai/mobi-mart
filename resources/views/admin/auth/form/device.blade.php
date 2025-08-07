<style>
  ::-webkit-scrollbar {
    width: 0;
  }
</style>

<x-auth.admin.layout title="Manage Products" name="Devices">
  <div class="p-4">
    <form method="post" action="{{ route('admin.products.device.add') }}">
      @csrf
      <div class="container bg-light-subtle shadow p-5 rounded mb-5 mt-5 col-12 col-sm-10 col-md-8">
        <div class="row">
          <div class="col-12">
            @if (session()->has('success'))
              <div class="alert alert-success fs-5">{{ session('success') }}</div>
            @endif
          </div>
          <h2 class="mb-4">Add New Device</h2>

          <div class="col-12 col-lg-6">
            <x-form.tom :options="$brands" name="brand" placeholder="Choose brand...">Brand</x-form.tom>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.tom :options="$categories" name="category" placeholder="Choose category...">Category</x-form.tom>
          </div>

          <div class="col-12 col-lg-12">
            <x-form.input name="name" placeholder="e.g. Mi A2 Lite" type="text">Device Name</x-form.input>
          </div>

          <div class="col-12">
            <x-form.textarea name="description" placeholder="Text...">Description</x-form.textarea>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="network" placeholder="e.g. 4G" type="text">Network</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input type="date" name="release" type="date">Release Date</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="dimensions">Dimensions</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="weight" placeholder="e.g. 178g" type="text">Weight</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="build">Build</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="sim">SIM</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="type">Screen Type</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="size">Screen Size</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="resolution">Resolution</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="os" placeholder="e.g. Android 14">OS</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="chipset">Chipset</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="cpu">CPU</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="gpu">GPU</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="slot">Card Slot</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="mcamera">Main Camera</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="scamera">Selfie Camera</x-form.input>
          </div>

          {{-- Dropdowns: jack, nfc, radio --}}
          <div class="col-12 col-lg-6">
            <x-form.tom :options="[['id' => 'Yes', 'name' => 'Yes'], ['id' => 'No', 'name' => 'No']]" name="jack" placeholder="Select option...">3.5mm Jack</x-form.tom>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.tom :options="[['id' => 'Yes', 'name' => 'Yes'], ['id' => 'No', 'name' => 'No']]" name="nfc" placeholder="Select option..." required>NFC</x-form.tom>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="wlan">WLAN</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="bluetooth">Bluetooth</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="positioning">Positioning</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="radio">Radio</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="usb">USB</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="sensors">Sensors</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="battery" placeholder="e.g. 4000 mAh">Battery</x-form.input>
          </div>

          <div class="col-12 col-lg-6">
            <x-form.input name="charging" placeholder="e.g. 10W">Charging</x-form.input>
          </div>

          {{-- Submit/Back --}}
          <div class="mt-4 text-start d-flex justify-content-between">
            <input type="submit" value="Submit" class="fs-5 btn btn-primary">
            <a href="{{ route('admin.products.devices') }}" class="btn fs-5">
              <div>Back</div>
            </a>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-auth.admin.layout>
