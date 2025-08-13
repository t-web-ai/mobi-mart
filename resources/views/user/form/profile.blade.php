<style></style>
<x-auth.user.layout>
  <div class="p-4">
    <form method="post" action="{{ route('profile.edit') }}">
      @csrf
      @method('PUT')
      <div class="container bg-light-subtle shadow p-5 rounded mb-5 mt-5 col-12 col-md-8 col-lg-6">
        <div class="row">
          <div class="row">
            <div class="col-12">
              @if (session()->has('success'))
                <div class="alert alert-success fs-5">{{ session('success') }}</div>
              @endif
            </div>
            <h2 class="mb-4">Edit Profile</h2>
            <div class="col-12">
              <x-form.input type="text" value="{{ auth()->user()->name }}" name="name">Name</x-form.input>
            </div>
            <div class="col-12">
              <x-form.input type="text" value="{{ auth()->user()->email }}" name="email">Email</x-form.input>
            </div>
            <div class="col-12">
              <x-form.input type="text" value="{{ auth()->user()->phone }}" name="phone">Phone</x-form.input>
            </div>
            <div class="col-12">
              <x-form.input type="text" value="{{ auth()->user()->address }}" name="address">Address</x-form.input>
            </div>
            <div class="mt-4 text-start d-flex justify-content-between">
              <input type="submit" value="Submit" class="fs-5 btn btn-primary">
              <a href="{{ route('user') }}" class="btn fs-5">
                <div>Back</div>
              </a>
            </div>
          </div>
        </div>
    </form>
  </div>
</x-auth.user.layout>
