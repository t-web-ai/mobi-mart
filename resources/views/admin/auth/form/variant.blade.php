<style>
  ::-webkit-scrollbar {
    width: 0;
  }
</style>
<x-auth.admin.layout title="Manage Products" name="{{ isset($brand) ? $brand->name : '' }} Products">
  <div class="p-4">
    <form method="post"
      action="{{ session()->has('update') ? route('admin.products.variants.update', session('update')['id']) : route('admin.products.variant.add') }}">
      @csrf
      @if (session()->has('update'))
        @method('PUT')
      @endif

      <div class="container bg-light-subtle shadow p-5 rounded mb-5 mt-5 col-12 col-sm-10 col-md-8">
        <div class="row">
          <div class="row">
            <div class="col-12">
              @if (session()->has('success'))
                <div class="alert alert-success fs-5">{{ session('success') }}</div>
              @endif
            </div>
            <h2 class="mb-4">{{ session()->has('update') ? 'Update' : 'Add New' }} Variant</h2>

            <div class="col-12 col-lg-6">
              <x-form.tom :options="$devices" name="device" placeholder="Choose device...">Device</x-form.tom>
            </div>
            <div class="col-12 col-lg-6">
              <x-form.tom :options="$colors" name="color" placeholder="Choose color...">Color</x-form.tom>
            </div>
            <div class="col-12 col-lg-6">
              <x-form.input type="text" placeholder="e.g. 4GB" name="ram">Ram</x-form.input>
            </div>
            <div class="col-12 col-lg-6">
              <x-form.input type="text" placeholder="e.g. 128GB" name="storage">Storage</x-form.input>
            </div>
            <div class="col-12 col-lg-6">
              <x-form.input type="number" placeholder="e.g. 400000" name="price">Price (MMK)</x-form.input>
            </div>
            <div class="col-12 col-lg-6">
              <x-form.input type="number" placeholder="e.g. 10000" name="discount">Discount (MMK)</x-form.input>
            </div>
            <div class="col-12 col-md-12">
              <x-form.input type="number" placeholder="e.g. 20" name="stock">Stock</x-form.input>
            </div>
            <div class="mt-4 text-start d-flex justify-content-between">
              <input type="submit" value="Submit" class="fs-5 btn btn-primary">
              <a href="{{ route('admin.products') }}" class="btn fs-5">
                <div>Back</div>
              </a>
            </div>
          </div>


        </div>
    </form>
  </div>
</x-auth.admin.layout>
