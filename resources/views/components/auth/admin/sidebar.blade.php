  <!-- customize sidebar - start -->
  <div id="side-bar" class="bg-body text-dark-subtle">
    <div class="offcanvas-header bg-secondary-subtle text-dark-subtle">
      <div class="fs-4">MobiMart</div>
      <button id="close-sidebar" class="btn btn-close p-2 rounded-circle" aria-label="Close sidebar"></button>
    </div>
    <div class="offcanvas-body p-3">
      <div class="navbar-nav fs-5">
        <x-auth.admin.sidebar.nav-item logo="bi bi-clipboard-data-fill" route="admin.dashboard" :active="Request::is('admin/dashboard')">
          <div>Dashbord</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-bag-fill" route="admin.products" :active="Request::is('admin/products*')">
          <div>Products</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-people-fill" route="admin.users" :active="Request::is('admin/users')">
          <div>Users</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-graph-up-arrow" route="admin.sales" :active="Request::is('admin/sales')">
          <div>Sales</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-fire" route="admin.popular" :active="Request::is('admin/popular')">
          <div>Popular</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-truck" route="admin.orders" :active="Request::is('admin/orders')">
          <div>Orders</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-gear" route="admin.setting" :active="Request::is('admin/setting')">
          <div>Setting</div>
        </x-auth.admin.sidebar.nav-item>
        <x-auth.admin.sidebar.nav-item logo="bi bi-box-arrow-left" route="admin.logout">
          <div>Logout</div>
        </x-auth.admin.sidebar.nav-item>
      </div>
    </div>
  </div>
  <!-- customize sidebar - end -->
