@props([
    'title' => '',
    'name' => '',
])
@extends('layouts.app')
@section('title', $title)

@section('customize-css')
  <style>
    :root {
      --sidebar-width: 275px;
    }

    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow-x: hidden;
    }

    #side-bar {
      width: var(--sidebar-width);
      transition: transform 0.3s ease;
      /* Initially hide sidebar by shifting left */
      transform: translateX(-100%);
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      z-index: 1050;
      /* same as Bootstrap offcanvas */
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      overflow-y: auto;
    }

    #side-bar.show {
      transform: translateX(0);
    }

    #main-content {
      transition: margin-left 0.3s ease;
      padding-left: 0;
    }

    @media screen and (max-width: 600px) {
      #main-content.shifted {
        margin-left: 0;
      }
    }

    @media screen and (min-width: 600px) {
      #main-content.shifted {
        margin-left: var(--sidebar-width);
      }
    }

    /* Navbar toggler styling */
    .navbar-toggler {
      cursor: pointer;
      padding: 0.5rem 1rem;
      border: none;
      background: transparent;
    }

    /* offcanvas styling  */
    .offcanvas-body>.navbar-nav>.nav-item {
      font-size: 1.2rem;
      padding-left: 15px;
      border-radius: 10px;
    }

    .offcanvas-body>.navbar-nav>.nav-item:hover {
      padding-left: 25px
    }

    .offcanvas-body>.navbar-nav>.nav-item {
      transition: 0.3s;
    }

    .offcanvas-header {
      padding: 0 18.5px;
    }

    .offcanvas-header,
    #menu-bar {
      height: 75px;
    }
  </style>
@endsection
@section('main')
  {{-- sidebar - start --}}
  <x-auth.admin.sidebar />
  {{-- sidebar - end --}}

  <!-- main content - start -->
  <div id="main-content">

    {{-- menu bar - start --}}
    <x-auth.admin.menu name="{{ $name }}"></x-auth.admin.menu>
    {{-- menu bar - end --}}

    <!-- content - start -->
    {{ $slot }}
    <!-- content - end -->

  </div>
  {{-- main content - end --}}

@endsection

@section('customize-js')
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script>
    $(document).ready(function() {
      // sidebar - start
      function openSidebar() {
        $("#side-bar").addClass("show");
        $("#main-content").addClass("shifted");
        $("#overlay").addClass("show");
      }

      function closeSidebar() {
        $("#side-bar").removeClass("show");
        $("#main-content").removeClass("shifted");
        $("#overlay").removeClass("show");
      }

      $("#open-sidebar").on("click", openSidebar);
      $("#close-sidebar").on("click", closeSidebar);
    });
    // sidebar - end
  </script>
@endsection
