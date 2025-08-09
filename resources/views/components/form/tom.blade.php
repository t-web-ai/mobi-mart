@props([
    'options' => [],
    'name' => '',
    'placeholder' => '',
    'margin' => true,
])
<link rel="stylesheet" href="{{ asset('css/tom.css') }}">
<script src="{{ asset('js/tom.js') }}"></script>
<div class="{{ $margin ? 'mt-2' : '' }}">
  @if ($margin)
    <label class="fs-5">{{ $slot }}</label>
  @endif

  <div class="position-relative">
    <select id="{{ $name }}" name="{{ $name }}">
      <option hidden selected disabled></option>
      @foreach ($options as $device)
        <option value="{{ $device['id'] }}" {{ old($name) == $device['id'] ? 'selected' : '' }}
          {{ request($name) == $device['id'] ? 'selected' : '' }}
          {{ session()->has('update') ? (session('update')[$name] == $device['id'] ? 'selected' : '') : '' }}>
          {{ $device['name'] }}
        </option>
      @endforeach
    </select>
  </div>
  <x-form.error error="{{ $name }}" />
</div>

<script>
  new TomSelect('#{{ $name }}', {
    placeholder: '{{ $placeholder }}',
    allowEmptyOption: false
  });
</script>
