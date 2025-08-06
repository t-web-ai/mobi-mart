@props(['link' => ''])
<a href="{{ url($link) }}" class="text-decoration-none col-12 d-block col-md-6 p-1 flex-grow-1 p-0">
  <div class="d-flex justify-content-between align-items-center btn bg-success-subtle p-3 rounded gap-2">
    {{ $slot }}
  </div>
</a>
