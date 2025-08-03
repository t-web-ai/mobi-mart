<x-auth.admin.layout title="Manage Dashboard" name="Dashboard">
  @if (session('authentication'))
    <div class="alert alert-success fs-5 m-4" id="authentication">{{ session('authentication') }}</div>
    <script>
      setTimeout(() => {
        document.getElementById('authentication').style.display = "none";
      }, 2000);
    </script>
  @endif
  <!-- content - start -->
  <div class="container-fluid">
    <div class="row px-2 my-4 align-items-center">

      <x-auth.admin.dashboard.card logo="bi bi-bag-fill" title="Products" link="admin.products">
        <div>{{ $products }}</div>
      </x-auth.admin.dashboard.card>
      <x-auth.admin.dashboard.card logo="bi bi-people-fill" title="Users" link="admin.users">
        <div>{{ $users }}</div>
      </x-auth.admin.dashboard.card>
      <x-auth.admin.dashboard.card logo="bi bi-truck" title="Orders" link="admin.orders">
        <div>{{ $orders }}</div>
      </x-auth.admin.dashboard.card>
      <x-auth.admin.dashboard.card logo="bi bi-graph-up-arrow" title="Sales" link="admin.sales">
        <div>{{ $sales }} MMK</div>
      </x-auth.admin.dashboard.card>
    </div>
  </div>
  <!-- content - end -->
</x-auth.admin.layout>
