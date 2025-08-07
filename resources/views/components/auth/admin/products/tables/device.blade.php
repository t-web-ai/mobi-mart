@props(['devices' => []])
<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th>ID</th>
        <th>Brand</th>
        <th>Device</th>
        <th>Type</th>
        <th>Release</th>
        <th>Os</th>
        <th>Battery</th>
        <th>Charging</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
      @foreach ($devices as $device)
        <tr>
          <x-auth.admin.products.data data="{{ $device->id }}" />
          <x-auth.admin.products.data data="{{ $device->brand->name }}" />
          <x-auth.admin.products.data data="{{ $device->name }}" />
          <x-auth.admin.products.data data="{{ $device->category->name }}" />
          <x-auth.admin.products.data data="{{ \Carbon\Carbon::parse($device->release_date)->format('Y F j') }}" />
          <x-auth.admin.products.data data="{{ $device->os }}" />
          <x-auth.admin.products.data data="{{ $device->battery }}" />
          <x-auth.admin.products.data data="{{ $device->charging }}" />
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
