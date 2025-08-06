@props(['devices' => []])
<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th>ID</th>
        <th>Brand</th>
        <th>Device</th>
        <th>Color</th>
        <th>Ram</th>
        <th>Storage</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
      @foreach ($devices as $device)
        <tr>
          <x-auth.admin.products.data data="{{ $device->id }}" />
          <x-auth.admin.products.data data="{{ $device->device->brand->name }}" />
          <x-auth.admin.products.data data="{{ $device->device->name }}" />
          <x-auth.admin.products.data data="{{ $device->color->name }}" />
          <x-auth.admin.products.data data="{{ $device->ram }}" />
          <x-auth.admin.products.data data="{{ $device->storage }}" />
          <x-auth.admin.products.data data="{{ $device->price }}" />
          <x-auth.admin.products.data data="{{ $device->stock }}" />
          <x-auth.admin.products.data data="{{ $device->created_at->diffForHumans() }}" />
          <x-auth.admin.products.data>
            <div>
              <a href="" class="btn fs-5 text-decoration-none btn-primary">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="" class="btn fs-5 text-decoration-none btn-danger">
                <i class="bi bi-trash"></i>
              </a>
            </div>
          </x-auth.admin.products.data>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
