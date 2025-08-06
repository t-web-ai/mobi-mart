@props([
    'id' => null,
    'link' => '',
    'active' => false,
])
<a href="{{ url($link) }}" class="text-decoration-none">
  <div
    class="fs-5 {{ $active ? 'bg-warning text-black' : 'bg-secondary-subtle text-body' }} p-1 px-4 rounded-pill w-auto">
    {{ $slot }}</div>
</a>
