@props(['colors' => []])
<div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
    <tbody>
      <tr class="text-center fs-5">
        <th style="width: 1px">ID</th>
        <th>Name</th>
        <th>Code</th>
        <th>Time</th>
        <th style="width: 1px">Action</th>
      </tr>
      @foreach ($colors as $color)
        <tr>
          <x-auth.admin.products.data data="{{ $color->id }}" />
          <x-auth.admin.products.data data="{{ $color->name }}" />
          <x-auth.admin.products.data data="{{ $color->code }}" />
          <x-auth.admin.products.data data="{{ $color->created_at->diffForHumans() }}" />
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
