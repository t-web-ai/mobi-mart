<style>
  .specifications td:nth-child(odd) {
    white-space: nowrap;
  }

  .specifications td:nth-child(even) {
    word-break: break-word;
  }

  .carousel {
    height: fit-content;
  }

  .carousel-inner {
    height: 50vh;
    border-radius: 0 0 5px 5px;
  }

  @media screen and (min-width: 576px) {
    .carousel-inner {
      height: 60vh;
    }
  }

  .carousel-item {
    width: 100%;
    height: 100%;
    background-color: white;
    box-shadow: 0px 0px 4px gray;
    border-radius: 0 0 5px 5px;
    padding: 10px;
  }

  .carousel-item>img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    background-color: white;
    border-radius: 5px;
  }

  button[data-bs-slide] {
    margin: 0 18px;
    margin-bottom: 100px;
    margin-top: 5px;
    opacity: 1;
  }

  button[data-bs-slide]>div {
    background-color: rgba(0, 0, 0, 0.111);
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    backdrop-filter: blur(7px);
  }
</style>
<x-auth.user.layout title="{{ $variant->device->name }}">
  <div class="container-fluid">
    <div class="row py-2 flex" id="main">
      <div class="carousel slide col-12 col-md-6 flex" data-bs-ride="carousel" id="item">
        <div class="d-flex justify-content-between fs-5 p-1 bg-secondary-subtle rounded-top px-3">
          <div>Price</div>
          <div>{{ number_format($variant->price, 0) }} MMK</div>
        </div>
        <div class="carousel-inner border border-secondary-subtle">
          {{-- image - start --}}
          @foreach ($variant->device_variant_images as $key => $image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <img src="{{ url('images/' . $image->image_path) }}" />
            </div>
          @endforeach
          {{-- image - end --}}
        </div>
        <div class="carousel-indicators position-relative m-0 w-100">
          {{-- indicators - start --}}
          @foreach ($variant->device_variant_images as $key => $image)
            <img data-bs-target="#item" data-bs-slide-to="{{ $key }}"
              class="{{ $key == 0 ? 'active' : '' }} flex-grow-1 flex-shrink-0 my-2"
              src="{{ url('images/' . $image->image_path) }}"
              style="height: 60px;object-fit: contain; cursor: pointer;" />
          @endforeach
          {{-- indicators - end --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#item" data-bs-slide="prev">
          <div>
            <span class="carousel-control-prev-icon"></span>
          </div>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#item" data-bs-slide="next">
          <div>
            <span class="carousel-control-next-icon"></span>
          </div>
        </button>
      </div>
      <div class="col-12 col-md-6 pb-2">
        <div class="card text-center bg-white h-100">
          <div class="card-body align-content-center">
            <img src="/assets/img/mobimart/mobimart.png" alt="" width="250" />
          </div>
        </div>
      </div>
      <div class="specifications col-12 col-md-12">
        <div class="bg-secondary-subtle text-body p-2 d-flex justify-content-between align-items-center">
          @can('order', $variant)
            <a href="{{ route('cart.add', $variant->id) }}"
              class="text-decoration-none text-body bg-light-subtle d-flex align-items-center shadow px-2 rounded"
              style="height:40px;">
              <i class="bi bi-cart3" style="cursor: pointer;font-size: 25px;">+</i>
            </a>
          @endcan
          <div class="btn btn-light fs-5 d-flex align-items-center justify-content-center ms-auto"
            onclick="history.back()">
            Go Back
          </div>
        </div>
        <table class="fs-5 table table-bordered table-striped">
          <tbody>
            @php
              $except = ['id', 'brand_id', 'category_id', 'created_at', 'updated_at', 'device_id'];
            @endphp

            {{-- table - start --}}
            @foreach ($variant->device->getAttributes() as $key => $value)
              @if (!in_array($key, $except))
                <tr>
                  <td>{{ strtoupper(str_replace('_', ' ', $key)) }}</td>
                  <td>
                    @if (\Illuminate\Support\Str::contains($key, 'date'))
                      {{ \Carbon\Carbon::parse($value)->format('M d, Y') }}
                    @else
                      {{ $value }}
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
            @foreach ($variant->getAttributes() as $key => $value)
              @if (!in_array($key, $except))
                <tr>
                  @if ($key == 'color_id')
                    <td>COLOR</td>
                  @else
                    <td>{{ strtoupper(str_replace('_', ' ', $key)) }}</td>
                  @endif

                  <td>
                    @if ($key == 'color_id')
                      {{ $variant->color->name }}
                    @else
                      {{ $value }}
                    @endif

                  </td>
                </tr>
              @endif
            @endforeach
            {{-- table - end  --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-auth.user.layout>
