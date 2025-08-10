@extends('layouts.app')
@section('title', 'Login to MobiMart')
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
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-10 col-lg-8 ">
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
            <p class="text-muted mb-4 fs-5">Login to your account</p>
            @error('authentication')
              <div class="alert alert-danger fs-5">{{ $message }}</div>
            @enderror
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <x-form.input type="email" placeholder="example@domain.com" name="email">Email</x-form.input>
              <x-form.input type="password" placeholder="********" name="password">Password</x-form.input>
              <x-form.submit>Sign in</x-form.submit>
            </form>
            <a href="{{ route('user.register') }}" class="text-decoration-none">
              <div class="text-center mt-2 fs-5">I don't have an account</div>
            </a>
          </div>
          {{-- right side form - end --}}

        </div>
      </div>
    </div>
  </div>
@endsection
