@props([
    'type' => 'text',
    'placeholder' => '',
    'name' => '',
    'multiple' => false,
])
<div class="mt-2">
  <label class="form-label fs-5 mb-0">{{ $slot }}</label>
  <div class="position-relative">
    <input type="{{ $type }}" class="form-control rounded fs-5" placeholder="{{ $placeholder }}"
      name="{{ $name }}" {{ $multiple ? 'multiple' : '' }} />
  </div>
  @if ($multiple)
    @foreach ($errors->get(str_replace('[]', '*', $name)) as $imageErrors)
      @foreach ($imageErrors as $imageError)
        <div class="text-danger">{{ $imageError }}</div>
      @endforeach
    @endforeach
  @else
    <x-form.error error="{{ $name }}" />
  @endif

</div>
