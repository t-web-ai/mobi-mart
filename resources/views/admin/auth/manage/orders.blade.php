<style>
  .ts-dropdown-content::-webkit-scrollbar {
    width: 0;
  }
</style>
<x-auth.admin.layout title="Manage Products" name="Orders">

  <div class="p-3 row">
    {{-- search box - start --}}

    <form action="{{ route('admin.orders') }}" method="GET" class="mb-4">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 align-content-center">
          <x-form.tom :options="$devices" name="brand" placeholder="Choose model" />
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 align-content-center">
          <select name="status" class="form-select fs-5 mt-2 border-2">
            <option value="" {{ request('status') == '' ? 'selected' : '' }}>All</option>
            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
          </select>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-2 align-content-center">
          <input type="date" name="date" class="form-control fs-5 mt-2 border-2" value="{{ request('date') }}">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 align-content-center">
          <div class="input-group mt-2">
            <input type="search" name="q" placeholder="e.g. Mi A2 Lite" class="form-control fs-5 border-2 border"
              value="{{ request('q') }}" style="box-shadow: none; border-color: #ced4da; outline: none;">
            <button class="btn btn-warning fs-5 border-end border-1">
              <i class="bi bi-search"></i>
            </button>
            <a href="{{ route('admin.orders') }}" class="btn btn-warning border-start border-1 fs-5">
              <i class="bi bi-x-lg"></i>
            </a>
          </div>
        </div>
      </div>
    </form>
    {{-- search box - end --}}


    {{-- table - start --}}
    @if (count($orders))
      <div class="mt-2">
        <x-auth.admin.products.tables.order :orders="$orders" />
        <div>{{ $orders->links() }}</div>
      </div>
    @else
      <div class="mt-5 d-flex justify-content-center">
        <div class="text-center p-4">
          <h5 class="text-muted mb-0">No orders found.</h5>
        </div>
      </div>
    @endif

    {{-- table - end  --}}
  </div>
</x-auth.admin.layout>
