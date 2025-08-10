@props([
    'device' => null,
])
<style>
  .ribbon {
    width: 200px;
    background: #dc3545;
    color: white;
    padding: 5px;
    text-align: center;
    line-height: 30px;
    /* position: absolute; */
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    font-size: 0.9rem;
    user-select: none;
    pointer-events: none;
    z-index: 10;
  }

  .ribbon-parent {
    transform: rotate(45deg);
  }
</style>
@foreach ($device->device_variants as $variant)
  <div class="p-2 col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="card position-relative overflow-hidden">
      {{-- stock out - start --}}
      @cannot('order', [$variant])
        <div class="ribbon-parent position-absolute top-0 align-content-center end-0" style="height:80px; width: 80px;">
          <div class="ribbon" style="height: fit-content; align-content-center">Out of Stock</div>
        </div>
      @endcannot
      {{-- stock out - end --}}
      <div class="card-body">
        <div class="card-title ">
          <div class="fs-5 bg-secondary-subtle rounded p-2 text-center text-truncate ">
            {{ $device->name }}
          </div>
          <div class="text-center my-4 image">
            <img src="{{ url('images/' . $variant->device_variant_images->first()->image_path) }}" alt="" />
          </div>
          {{-- specification - start  --}}
          <div class="d-flex justify-content-between flex-wrap bg-l p-1 px-2 bg-light-subtle mb-2 rounded">
            <div class="fs-5">
              <div>Ram : {{ $variant->ram }}</div>
              <div>Storage : {{ $variant->storage }}</div>
            </div>
            <div class="fs-5 d-flex flex-column">
              <div class="text-center text-muted">Color</div>
              <div class="d-flex gap-2 bg-secondary-subtle p-1 rounded-pill">
                <div class="border-2 rounded-pill shadow me-auto"
                  style="width: 20px; height: 20px; background-color:{{ $variant->color->code }};"></div>
              </div>

            </div>
          </div>
          {{-- specification - end --}}
          <div class="d-flex rounded overflow-hidden">
            <a href="" class="text-decoration-none text-black col-8 flex-grow-1">
              <div class="bg-warning fs-5 text-center py-2">
                Details
              </div>
            </a>
            @can('order', $variant)
              <div class="col-4 bg-black text-center text-white d-flex justify-content-center align-items-center">
                <i class="bi bi-cart3 fs-3"></i>
              </div>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
