@props([
    'logo' => '',
    'title' => '',
    'link' => 'admin.index',
])

<div class="p-3 col-12 col-sm-12 col-md-6 col-lg-4 flex-grow-1">
  <a href="{{ route($link) }}" class="text-decoration-none">
    <div class="card shadow-sm bg-light-subtle border-0 rounded-4 px-3">
      <div class="card-body d-flex align-items-center justify-content-between gap-3">
        <div>
          <i class="{{ $logo }}" style="font-size: 3rem;"></i>
        </div>
        <div class="text-end flex-grow-1">
          <div class="fs-4 fw-semibold">{{ $title }}</div>
          <div class="fs-5 text-muted">{{ $slot }}</div>
        </div>
      </div>
    </div>
  </a>
</div>
