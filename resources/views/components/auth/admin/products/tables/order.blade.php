@props(['orders' => []])
<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th>ID</th>
        <th>User</th>
        <th>Phone</th>
        <th>Device</th>
        <th>Shipping Address</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
      @foreach ($orders as $order)
        <tr>
          <x-auth.admin.products.data data="{{ $order->id }}" />
          <x-auth.admin.products.data data="{{ $order->user->name ?? 'Deleted Account' }}" />
          <x-auth.admin.products.data data="{{ $order->user->phone ?? '**********' }}" />
          <td>
            @foreach ($order->device_variants as $item)
              <div class="input-group d-flex flex-nowrap mb-1">
                <button
                  class="btn text-truncate small btn-success py-1 px-4 rounded-start-pill text-center  d-inline-block fs-5">
                  {{ $item->device->name }}
                </button>
                <button
                  class="btn btn-dark py-1 px-3 rounded-end-pill fs-5">{{ $item->device_variant_orders->where('order_id', $order->id)->first()->quantity }}</button>
              </div>
            @endforeach
          </td>
          <x-auth.admin.products.data data="{{ $order->shipping_address }}" />
          <x-auth.admin.products.data data="{{ ucfirst($order->status) }}" />
          <x-auth.admin.products.data data="{{ $order->created_at->diffForHumans() }}" />
          <x-auth.admin.products.data>
            <div class="d-flex justify-content-end gap-2 m-auto">
              @if ($order->status == 'pending')
                <x-auth.admin.products.modal logo="bi bi-check-square" background="btn-warning" header="Confirm Box"
                  target="update_id_{{ $order->id }}">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="fs-5">
                      <button class="fs-5 btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <form action="{{ route('admin.orders.confirm', $order->id) }}"
                      id="update_confirm_id_{{ $order->id }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    <div class="fs-5 d-flex align-items-center">
                      <button class="fs-5 btn btn-success" form="update_confirm_id_{{ $order->id }}">Ok</button>
                    </div>
                  </div>
                </x-auth.admin.products.modal>
              @endif
              <x-auth.admin.products.modal logo="bi bi-trash" background="btn-danger" header="Deletion"
                target="delete_id_{{ $order->id }}">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="fs-5">
                    <button class="fs-5 btn" data-bs-dismiss="modal">Cancel</button>
                  </div>
                  <form action="{{ route('admin.orders.delete', $order->id) }}"
                    id="delete_confirm_id_{{ $order->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <div class="fs-5 d-flex align-items-center">
                    <button class="fs-5 btn btn-danger" form="delete_confirm_id_{{ $order->id }}">Confirm</button>
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
