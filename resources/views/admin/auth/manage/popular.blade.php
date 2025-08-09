<x-auth.admin.layout title="Popular Products" name="Popular">

  <div class="p-3">
    {{-- table - start --}}
    @if (count($devices))
      <div class="mt-2">
        <x-auth.admin.products.tables.popular :devices="$devices" />
      </div>
    @else
      <div class="mt-5 d-flex justify-content-center">
        <div class="text-center p-4">
          <h5 class="text-muted mb-0">No devices found.</h5>
        </div>
      </div>
    @endif

    {{-- table - end  --}}
  </div>
</x-auth.admin.layout>
