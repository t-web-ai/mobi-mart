<x-auth.admin.layout title="Manage Products" name="Users">
  <style>
    input:checked+label>div {
      background-color: #FFC107;
      color: black;
    }

    input+label {
      widows: 100%;
      display: block;
    }

    input+label>div {
      padding: 6px 12px !important;
    }
  </style>
  <div class="p-3 row">
    <form action="{{ route('admin.users') }}" method="GET">
      {{-- search box - start --}}
      <div class="row">
        <div class="col-12 align-content-center">
          <div class="px-2 fs-5">Filter <i class="bi bi-funnel-fill"></i></div>
        </div>
        <div class="col-4 col-md-2 align-content-center">
          <input type="radio" name="filter" id="username" value="username"
            {{ request('filter') == 'username' ?? 'checked' }} checked hidden>
          <label for="username">
            <div class="bg-light-sublt shadow-sm fs-5 w-100 px-2 mt-1 mb-3 rounded text-center border border-2">Username
            </div>
          </label>
        </div>
        <div class="col-4 col-md-2 align-content-center">
          <input type="radio" name="filter" id="address" value="address"
            {{ request('filter') == 'address' ? 'checked' : '' }} hidden>
          <label for="address">
            <div class="bg-light-sublt shadow-sm fs-5 w-100 px-2 mt-1 mb-3 rounded text-center border border-2">Address
            </div>
          </label>
        </div>
        <div class="col-4 col-md-2 align-content-center">
          <input type="radio" name="filter" id="email" value="email"
            {{ request('filter') == 'email' ? 'checked' : '' }} hidden>
          <label for="email">
            <div class="bg-light-sublt shadow-sm fs-5 w-100 px-2 mt-1  mb-3 rounded text-center border border-2">Email
            </div>
          </label>
        </div>
        <div class="col-12 col-sm-12 col-md-6 align-content-center">
          <div class="input-group mb-3">
            <input type="search" name="q" placeholder="e.g. John Doe" class="form-control fs-5 border-2 border"
              value="{{ request('q') }}" style="box-shadow: none; border-color: #ced4da; outline: none;">
            <button class="btn btn-warning fs-5 border-end border-1">
              <i class="bi bi-search"></i>
            </button>
            <a href="{{ route('admin.users') }}" class="btn btn-warning border-start border-1 fs-5">
              <i class="bi bi-x-lg"></i>
            </a>
          </div>
        </div>
      </div>
    </form>

    {{-- search box - end --}}

    {{-- table - start --}}
    @if (count($users))
      <div class="mt-2">
        <x-auth.admin.products.tables.user :users="$users" />
        <div>{{ $users->links() }}</div>
      </div>
    @else
      <div class="mt-5 d-flex justify-content-center">
        <div class="text-center p-4">
          <h5 class="text-muted mb-0">No users found.</h5>
        </div>
      </div>
    @endif
    {{-- table - end  --}}
  </div>
</x-auth.admin.layout>
