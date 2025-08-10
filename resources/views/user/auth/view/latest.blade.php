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
    <div class="row p-1">
      <x-auth.user.card.variant :variants="$variants" />
    </div>
    <div>
      {{ $variants->links() }}
    </div>
  </div>
</x-auth.user.layout>
