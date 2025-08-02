<x-auth.admin.layout title="Manage Dashboard" name="Dashboard">
  @if (session('authentication'))
    <div class="alert alert-success fs-5 m-2" id="authentication">You are now logged in!</div>
    <script>
      setTimeout(() => {
        document.getElementById('authentication').style.display = "none";
      }, 2000);
    </script>
  @endif
</x-auth.admin.layout>
