<style>
  .image {
    width: 100%;
    height: 300px;
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
        <a href="">
          <div class="btn btn-success fs-5">See All</div>
        </a>
      </div>
      <div class="row p-1">
        @foreach ($brand->devices as $device)
          <x-auth.user.card.card :device="$device" />
        @endforeach
      </div>
    </div>
  @endforeach
</x-auth.user.layout>
