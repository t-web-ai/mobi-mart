<style>
  .image {
    width: 100%;
    height: 300px;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
  }

  .image>img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: contain;
  }
</style>
<x-auth.user.layout title="Brands Collections">
  @foreach ($brands as $brand)
    <div class="p-4">
      <div class="fs-5 bg-secondary-subtle px-2 ps-4 py-2 rounded d-flex justify-content-between align-items-center">
        <div>{{ $brand->name }} Models</div>
        <a href="{{ url('brands/devices?brand=' . $brand->id) }}">
          <div class="btn btn-success fs-5">See All</div>
        </a>
      </div>
      <div class="row p-1">
        @if (count($brand->devices))
          @foreach ($brand->devices as $device)
            <x-auth.user.card.card :device="$device" />
          @endforeach
        @else
          <div class="mt-5 d-flex justify-content-center">
            <div class="text-center p-4">
              <h5 class="text-muted mb-0">No devices found.</h5>
            </div>
          </div>
        @endif

      </div>
    </div>
  @endforeach
</x-auth.user.layout>
