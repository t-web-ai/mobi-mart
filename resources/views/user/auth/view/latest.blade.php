<style>
  .image {
    width: 100%;
    height: 300px;
    background-color: white;
    border-radius: 10px;
  }

  .image>img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: contain;
  }
</style>
<x-auth.user.layout title="Brands Collections">

  <div class="p-4">
    @if (count($variants))
      <div class="row p-1">
        <x-auth.user.card.variant :variants="$variants" />
      </div>
      <div>
        {{ $variants->links() }}
      </div>
    @else
      <div class="mt-5 d-flex justify-content-center">
        <div class="text-center p-4">
          <h5 class="text-muted mb-0">No devices found.</h5>
        </div>
      </div>
    @endif
  </div>
</x-auth.user.layout>
