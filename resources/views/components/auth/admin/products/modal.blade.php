@props([
    'button' => '',
    'target' => '',
    'header' => '',
    'debug' => false,
])
<div>
  <div class="btn bg-light-subtle fs-5 shadow-sm d-flex justify-content-between gap-2 align-items-center mt-2"
    data-bs-target="#{{ $target }}" data-bs-toggle="modal">
    <div>{{ $button }}</div>
    <span class="dropdown-toggle"></span>
  </div>
  <div class="modal" id="{{ $target }}" {!! $debug ? 'style="display: block"' : '' !!}>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div class="fs-5">{{ $header }}</div>
          <div class="btn btn-close" data-bs-dismiss="modal"></div>
        </div>
        <div class="modal-body">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>

</div>
