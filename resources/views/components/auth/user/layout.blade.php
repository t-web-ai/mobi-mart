@props([
    'title' => '',
])
@extends('layouts.app')
@section('title', $title)

@section('customize-css')

@endsection
@section('main')
  <x-auth.user.header.header />
  <!-- main content - start -->
  <div>
    <!-- content - start -->
    {{ $slot }}
    <!-- content - end -->
  </div>
  {{-- main content - end --}}
  <x-auth.user.footer.footer />
@endsection

@section('customize-js')

@endsection
