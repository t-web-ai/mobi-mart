@props([
    'type' => 'text',
    'placeholder' => '',
    'name' => '',
])
<div class="mb-3">
  <label class="form-label fs-5">{{ $slot }}</label>
  <div class="position-relative">
    <input type="{{ $type }}" class="form-control rounded fs-5" placeholder="{{ $placeholder }}"
      name="{{ $name }}" value="{{ old("$name") }}" required />

    {{-- password toggler - start --}}
    @if ($type == 'password')
      <span style="right:15px; cursor:pointer; align-content:center; height:100%;top:0;" class="fs-5 position-absolute ">
        <i class="bi bi-eye-fill" onclick="toggle(this)"></i>
      </span>
    @endif
    {{-- password toggler - end --}}

  </div>
  <x-form.error error="{{ $name }}" />
</div>

@section('customize-js')
  <script>
    function toggle(e) {
      e.classList.toggle('bi-eye-slash');
      const inputBox = e.parentElement.parentElement.children[0];
      if (inputBox.type == "password") {
        inputBox.type = "text";
        return;
      }
      inputBox.type = "password";
    }
  </script>
@endsection
