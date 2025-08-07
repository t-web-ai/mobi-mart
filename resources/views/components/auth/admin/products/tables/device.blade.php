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
              <a href="{{ route('admin.products.devices.update', $device->id) }}"
                class="btn fs-5 text-decoration-none btn-primary">
                <i class="bi bi-pencil-square"></i>
              </a>
              <x-auth.admin.products.modal logo="bi bi-trash" background="btn-danger" header="Deletion" target="delete">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="fs-5">
                    <button class="fs-5 btn" data-bs-dismiss="modal">Cancel</button>
                  </div>
                  <form action="{{ route('admin.products.devices.delete', $device->id) }}" id="confirm"
                    method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <div class="fs-5 d-flex align-items-center">
                    <button class="fs-5 btn btn-danger" form="confirm">Confirm</button>
                  </div>
                </div>
              </x-auth.admin.products.modal>
            </div>
          </x-auth.admin.products.data>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
