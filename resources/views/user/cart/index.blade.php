<style></style>
<x-auth.user.layout title="Cart">
  <div class="container p-2">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <a href="{{ route('brands.devices') }}" class="bi bi-chevron-left btn fs-3">Back</a>
      </div>
      <h2 class="my-2 p-2">Your Shopping Cart</h2>
    </div>

    @if (!empty($cart) && count($cart) > 0)
      <div class="p-4">
        @foreach ($cart as $id => $item)
          <div
            class="d-flex justify-content-center row bg-white text-dark p-3 py-4 mb-2 rounded border border-2 border-body">
            <div class="d-flex justify-content-center col-12 row mb-2">
              <div class="col-8 col-md-4 col-lg-2 mb-3">
                <img src="{{ url('images/' . $item['image'][0]->image_path) }}" style="width:100%">
              </div>
              <div class="col-12 col-md-8 col-lg-10 fs-5 d-flex flex-column">
                <div class="mb-2">
                  {{ $item['name'] }} ({{ $item['color']->name }})
                </div>
                <div class="mb-2">
                  {{ $item['ram'] }} {{ $item['storage'] }}
                </div>
                <div class="row w-100">
                  <div class="col-12 col-lg-4 d-flex align-items-center">
                    <div class="fs-5 text-warning">
                      {{ number_format($item['price'] * $item['quantity'], 0) }} MMK</div>
                  </div>
                  <div class="col-6 col-lg-4 mt-2">
                    <div class="d-flex justify-content-between rounded border border-2">
                      <a href="{{ route('cart.remove', $id) }}" class="btn fs-5 d-block border-end rounded-0">−</a>
                      <div type="text" class="text-center fs-5 text-truncate align-content-center px-3">
                        {{ $item['quantity'] }}
                      </div>
                      <a href="{{ route('cart.add', $id) }}" class="btn fs-5 d-block border-start rounded-0">+</a>
                    </div>
                  </div>
                  <div class="col-6 col-lg-4 mt-2">
                    <div class="btn btn btn-danger w-100 fs-5 border border-2 border-danger">
                      <a href="{{ route('cart.destroy', $id) }}" class="text-decoration-none text-white">
                        <i class="bi bi-trash"></i> Remove
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4 text-center container-fluid">
        <h4>Total:
          <span class="text-success fw-bold">
            {{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 0) }} MMK
          </span>
        </h4>
        <form action="{{ route('orders.order') }}" method="post" id="checkout">@csrf</form>
        <button class="btn btn-warning fs-5" form="checkout">
          Checkout
        </button>
      </div>
    @else
      <div class="alert alert-warning text-center fs-5 my-5">
        Your cart is empty
      </div>
    @endif
  </div>
</x-auth.user.layout>
