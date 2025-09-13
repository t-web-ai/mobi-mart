@props(['devices' => []])
<div class="table-responsive rounded">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th>Model</th>
        <th>Ram</th>
        <th>Storage</th>
        <th>Total Orders</th>
        <th>Total Sales</th>
      </tr>
      @foreach ($devices as $device)
        <tr>
          <x-auth.admin.products.data data="{{ $device['device'] }}" />
          <x-auth.admin.products.data data="{{ $device['ram'] }}" />
          <x-auth.admin.products.data data="{{ $device['storage'] }}" />
          <x-auth.admin.products.data data="{{ $device['quantity'] }}" />
          <x-auth.admin.products.data data="{{ number_format($device['sale'], 0) }} MMK" />
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
