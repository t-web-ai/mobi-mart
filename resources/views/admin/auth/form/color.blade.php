<style>
  ::-webkit-scrollbar {
    width: 0;
  }
</style>
<x-auth.admin.layout title="Manage Products" name="{{ isset($brand) ? $brand->name : '' }} Products">
  <div class="p-4">
    <form method="post" action="{{ route('admin.products.color.add') }}">
      @csrf
      <div class="container bg-light-subtle shadow p-5 rounded mb-5 mt-5 col-12 col-md-8 col-lg-6">
        <div class="row">
          <div class="row">
            <div class="col-12">
              @if (session()->has('success'))
                <div class="alert alert-success fs-5">{{ session('success') }}</div>
              @endif
            </div>
            <h2 class="mb-4">Add New Color</h2>
            <div class="col-12">
              <x-form.input type="text" placeholder="e.g. Green" name="name">Name</x-form.input>
            </div>
            <div class="col-12">
              <x-form.input type="text" placeholder="e.g. #8bc34a" name="code">Code</x-form.input>
            </div>
            <div class="mt-4 text-start d-flex justify-content-between">
              <input type="submit" value="Submit" class="fs-5 btn btn-primary">
              <a href="{{ route('admin.products.colors') }}" class="btn fs-5">
                <div>Back</div>
              </a>
            </div>
          </div>


        </div>
    </form>
  </div>
</x-auth.admin.layout>
