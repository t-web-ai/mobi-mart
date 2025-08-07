@props([
    'placeholder' => '',
    'name' => '',
])
<div class="mt-2">
  <label class="form-label fs-5 mb-0">{{ $slot }}</label>
  <div class="position-relative">
    <textarea name="{{ $name }}" cols="30" rows="3" class="form-control rounded fs-5"
      placeholder="{{ $placeholder }}" required>{{ old("$name") }}</textarea>
  </div>
  <x-form.error error="{{ $name }}" />
</div>
