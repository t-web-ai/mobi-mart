@props(['error'])
@error("$error")
  <div class="text-danger sm mt-1">
    {{ $message }}
  </div>
@enderror
