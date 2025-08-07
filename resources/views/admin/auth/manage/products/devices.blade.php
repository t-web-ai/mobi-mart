<style>
  ::-webkit-scrollbar {
    width: 0;
  }
</style>
<x-auth.admin.layout title="Manage Products" name="Devices">

  <div class="p-3 row">
    {{-- search box - start --}}
    <div class="col-12 col-md-6 col-lg-8 align-content-center">
      <form action="{{ route('admin.products.devices.search') }}" method="GET">
        <div class="input-group mt-2">
          <input type="search" name="q" placeholder="e.g. Mi A2 Lite" class="form-control fs-5 border-2 border"
            value="{{ request()->query('q') }}" style="box-shadow: none; border-color: #ced4da; outline: none;">
          <button class="btn btn-warning fs-5">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
    </div>

    {{-- search box - end --}}

    {{-- manage modal - start --}}
    <div class="col-6 col-md-3 col-lg-2 justify-content-center">
      <x-auth.admin.products.modal button="View" header="Choose One" target="manage">
        <div class="d-flex flex-wrap">
          <x-auth.admin.products.add-button link="admin/products/colors" :active="Request::is('admin/products/colors')">
            <div class="fs-5">Color</div>
            <i class="bi bi-palette fs-1"></i>
          </x-auth.admin.products.add-button>

          <x-auth.admin.products.add-button link="admin/products/brands">
            <div class="fs-5">Brand</div>
            <i class="bi bi-bag-fill fs-1"></i>
          </x-auth.admin.products.add-button>

          <x-auth.admin.products.add-button link="admin/products/devices">
            <div class="fs-5">Device</div>
            <i class="bi bi-phone fs-1"></i>
          </x-auth.admin.products.add-button>

          <x-auth.admin.products.add-button link="admin/products" :active="Request::is('admin/products/colors')">
            <div class="fs-5">Product</div>
            <i class="bi bi-boxes fs-1"></i>
          </x-auth.admin.products.add-button>
        </div>
      </x-auth.admin.products.modal>
    </div>
    {{-- manage modal - end --}}

    {{-- add - start --}}
    <div class="col-6 col-md-3 col-lg-2">
      <a href="{{ route('admin.products.device.add') }}" class="text-decoration-none text-body">
        <div class="btn  bg-light-subtle fs-5 shadow-sm d-flex justify-content-between gap-2 align-items-center mt-2">
          <div>Add</div>
          <i class="bi bi-plus-circle fs-5"></i>
        </div>
      </a>
    </div>
    {{-- add - end --}}

    {{-- table - start --}}
    @if (count($devices))
      <div class="mt-2">
        <x-auth.admin.products.tables.device :devices="$devices" />
        <div>{{ $devices->links() }}</div>
      </div>
    @else
      <div class="mt-5 d-flex justify-content-center">
        <div class="text-center p-4">
          <h5 class="text-muted mb-0">No deivces found.</h5>
        </div>
      </div>
    @endif

    {{-- table - end  --}}
  </div>
</x-auth.admin.layout>
