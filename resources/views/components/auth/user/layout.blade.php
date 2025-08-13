@props([
    'title' => '',
])
@extends('layouts.app')
@section('title', $title)

@section('customize-css')
  <style>
    body::-webkit-scrollbar {
      width: 0;
    }
  </style>
@endsection
@section('main')
  <x-auth.user.header.header />
  <!-- main content - start -->
  <div>
    @auth
      <div class="modal" id="profile">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <div class="fs-5 text-muted">Hello, {{ auth()->user()->name }}</div>
              <div class="btn btn-close" data-bs-dismiss="modal"></div>
            </div>
            <div class="modal-body">
              <div class="list-group">
                <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action fs-5">
                  <i class="bi bi-person-circle me-2"></i> Edit Profile
                </a>
                <a href="{{ route('cart.view') }}" class="list-group-item list-group-item-action fs-5">
                  <i class="bi bi-cart me-2"></i> View Cart
                </a>
                <a href="{{ route('orders.view') }}" class="list-group-item list-group-item-action fs-5">
                  <i class="bi bi-clock-history me-2"></i> View Order History
                </a>
                <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action text-danger fs-5">
                  <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    @endauth
    <!-- content - start -->
    {{ $slot }}
    <!-- content - end -->
  </div>
  {{-- main content - end --}}
  <x-auth.user.footer.footer />
@endsection

@section('customize-js')

@endsection
