@props([
    'logo' => '',
    'route' => '',
    'active' => false,
])
<div class="nav-item mb-1 {{ $active ? 'bg-secondary-subtle text-dark-subtle' : '' }}">
  <a href="{{ route("$route") }}" class="nav-link">
    <div class="d-flex align-items-center gap-3">
      <i class="{{ $logo }} fs-3"></i>
      <span class="fs-5">{{ $slot }}</span>
    </div>
  </a>
</div>
