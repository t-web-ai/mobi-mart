<!-- menu bar - start -->
<div class="d-flex bg-secondary-subtle flex-column sticky-top">
  <div class="d-flex justify-content-between w-100 mt-3">
    <div class="navbar navbar-expand-sm d-flex align-items-center">
      <div class="navbar-toggler mx-2 p-2 fs-5" data-bs-toggle="collapse" data-bs-target="#menu">
        <i class="bi bi-list"></i>
      </div>
      <a href="{{ route('user') }}" class="text-decoration-none text-body">
        <div class="p-2 fs-3 text-nowrap ps-sm-4">MobiMart</div>
      </a>
    </div>
    <div class="d-flex align-items-center navbar navbar-expand">
      <div class="p-2 fs-5 navbar-brand">
        <a href="">
          <i class="bi bi-bag text-body"></i>
        </a>
      </div>
      <div class="p-2 fs-5 navbar-brand">
        <a href="" class="text-decoration-none text-body">
          <i class="bi bi-box-arrow-in-right"></i>
        </a>
      </div>
      <div onclick="theme.change_theme(this)" class="me-3">
        <script>
          document.write(theme.get_theme_icon());
        </script>
      </div>
    </div>
  </div>
  <div class="navbar navbar-expand-sm">
    <div class="collapse navbar-collapse" id="menu">
      <form action="" class="w-100 px-3">
        <div class="row">
          <div class="col-12 col-sm-4 col-md-3 col-lg-2">
            <div>
              <x-form.tom name="brand" :options="$brands" placeholder="Select Brand" :margin="false"></x-form.tom>
            </div>
          </div>
          <div class="col-12 col-sm-8 col-md-9 col-lg-10 mt-2 mt-sm-0">
            <div class="input-group">
              <input type="search" name="q" placeholder="e.g. Mi A2 Lite" class="form-control fs-5"
                value="{{ request('q') }}" style="box-shadow: none; border-color: #ced4da; outline: none;">
              <button class="btn btn-warning fs-5 border-end border-1">
                <i class="bi bi-search"></i>
              </button>
              <a href="{{ url()->current() }}"
                class="btn btn-warning border-start border-1 fs-5 d-flex align-items-center">
                <i class="bi bi-x-lg"></i>
              </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- menu bar - end -->
