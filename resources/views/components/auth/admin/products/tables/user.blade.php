@props(['users' => []])
<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th style="width: 1px">ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th style="width: 1px">Action</th>
        <th>Created</th>
      </tr>
      @foreach ($users as $user)
        <tr>
          <x-auth.admin.products.data data="{{ $user->id }}" />
          <x-auth.admin.products.data data="{{ $user->name }}" />
          <x-auth.admin.products.data data="{{ $user->email }}" />
          <x-auth.admin.products.data data="{{ $user->address }}" />
          <x-auth.admin.products.data data="{{ $user->created_at->diffForHumans() }}" />
          <x-auth.admin.products.data>
            <div>
              <x-auth.admin.products.modal logo="bi bi-trash" background="btn-danger" header="Deletion"
                target="delete_id_{{ $user->id }}">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="fs-5">
                    <button class="fs-5 btn" data-bs-dismiss="modal">Cancel</button>
                  </div>
                  <form action="{{ route('admin.users.delete', $user->id) }}" id="confirm_id_{{ $user->id }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <div class="fs-5 d-flex align-items-center">
                    <button class="fs-5 btn btn-danger" form="confirm_id_{{ $user->id }}">Confirm</button>
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
