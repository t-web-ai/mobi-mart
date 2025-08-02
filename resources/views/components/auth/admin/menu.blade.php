@props(['name' => ''])
<!-- menu bar - start -->
<div
  class="container-fluid w-100 p-2 d-flex justify-content-between align-items-center py-3 sticky-top bg-secondary-subtle text-dark-subtle"
  id="menu-bar">
  <button id="open-sidebar" class="navbar-toggler" aria-label="Toggle sidebar">
    <i class="bi bi-list fs-3"></i>
  </button>
  <div class="navbar-text fs-4 px-3">{{ $name }}</div>
  <div onclick="theme.change_theme(this)" class="me-3">
    <script>
      document.write(theme.get_theme_icon())
    </script>
  </div>
</div>
<!-- menu bar - end -->
