@props(['brands' => []])
<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th style="width: 1px">ID</th>
        <th>Name</th>
        <th>Time</th>
        <th style="width: 1px">Action</th>
      </tr>
      @foreach ($brands as $brand)
        <tr>
          <x-auth.admin.products.data data="{{ $brand->id }}" />
          <x-auth.admin.products.data data="{{ $brand->name }}" />
          <x-auth.admin.products.data data="{{ $brand->created_at->diffForHumans() }}" />
          <x-auth.admin.products.data>
            <div>
              <a href="{{ route('admin.products.brands.update', $brand->id) }}"
                class="btn fs-5 text-decoration-none btn-primary">
                <i class="bi bi-pencil-square"></i>
              </a>
              <x-auth.admin.products.modal logo="bi bi-trash" background="btn-danger" header="Deletion"
                target="delete_id_{{ $brand->id }}">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="fs-5">
                    <button class="fs-5 btn" data-bs-dismiss="modal">Cancel</button>
                  </div>
                  <form action="{{ route('admin.products.brands.delete', $brand->id) }}"
                    id="confirm_id_{{ $brand->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <div class="fs-5 d-flex align-items-center">
                    <button class="fs-5 btn btn-danger" form="confirm_id_{{ $brand->id }}">Confirm</button>
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
