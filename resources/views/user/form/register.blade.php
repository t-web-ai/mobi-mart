@extends('layouts.app')
@section('title', 'Admin : Login')
@section('customize-css')
  <style>
    .auth-card {
      border-radius: 1rem;
      overflow: hidden;
    }

    .auth-image {
      background-image: url("/mobimart/mobimart.png");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      min-height: 350px;
    }
  </style>
@endsection
@section('main')
  <div class="container px-4">
    <div class="row justify-content-center my-5 vh-100">
      <div class="col-md-12 col-lg-10">
        <div class="row auth-card">

          {{-- left side image - start --}}
          <div class="col-md-5 d-none d-md-block auth-image bg-light"></div>
          {{-- left side image - end --}}

          {{-- right side form - start --}}
          <div class="col-md-7 p-5 bg-secondary-subtle text-dark-subtle">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h2 class="fw-bold text-warning">MobiMart</h2>
              <div onclick="theme.change_theme(this)">
                <script>
                  document.write(theme.get_theme_icon());
                </script>
              </div>
            </div>
            <p class="text-muted mb-4 fs-5">Register new account</p>
            <form action="{{ route('user.register') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <x-form.input type="text" placeholder="e.g. John Doe" name="name">Username</x-form.input>
                </div>
                <div class="col-lg-6">
                  <x-form.input type="email" placeholder="example@domain.com" name="email">Email</x-form.input>
                </div>
                <div class="col-lg-6">
                  <x-form.input type="number" placeholder="09*********" name="phone">Phone</x-form.input>
                </div>
                <div class="col-lg-6">
                  <x-form.input type="text" placeholder="e.g. Mandalay" name="address">Address</x-form.input>
                </div>
                <div class="col-lg-12">
                  <x-form.input type="password" placeholder="********" name="password">Password</x-form.input>
                </div>
              </div>
              <x-form.submit>Sign in</x-form.submit>
              <a href="{{ route('user.login') }}" class="text-decoration-none">
                <div class="text-center mt-2 fs-5">I already have an account</div>
              </a>
            </form>
          </div>
          {{-- right side form - end --}}

        </div>
      </div>
    </div>
  </div>
@endsection
