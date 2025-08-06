@props(['data' => null])
<td class="text-truncate text-center">
  <div class="fs-5">{{ $data ?? $slot }}</div>
</td>
