<style>
  body::-webkit-scrollbar {
    width: 0;
  }

  /* Remove blue highlight when clicked (focus) */
  .accordion-button:focus {
    box-shadow: none;
    outline: none;
  }

  /* Remove primary background when opened */
  .accordion-button:not(.collapsed) {
    background-color: transparent;
    /* or your desired color */
    color: inherit;
    /* keep original text color */
    box-shadow: none;
  }

  .accordion-button {
    color: inherit !important;
  }

  .accordion-button:focus,
  .accordion-button:not(.collapsed) {
    box-shadow: none !important;
    color: inherit !important;
  }

  .accordion-button::after {
    position: absolute;
    top: 17px;
    right: 20px;
  }
</style>
<x-auth.user.layout title="Order History">
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <a href="{{ route('brands.devices') }}" class="bi bi-chevron-left btn fs-3">Back</a>
      </div>
      <h2 class="my-2 p-2">Order History</h2>
    </div>

    @if (count($orders))
      @php
        // Group orders by date (Y-m-d)
        $ordersByDate = $orders->groupBy(function ($order) {
            return \Carbon\Carbon::parse($order->created_at)->format('Y-m-d');
        });
      @endphp

      @foreach ($ordersByDate as $date => $ordersOnDate)
        {{-- group by date - start --}}
        <div class="fs-5 text-muted">{{ \Carbon\Carbon::parse($date)->format('M d, Y') }}</div>
        <div class="accordion my-2" id="orderAccordion-{{ $date }}">
          {{-- group by order id - start --}}
          @foreach ($ordersOnDate as $order)
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading-{{ $date }}{{ $order->id }}">
                <button class="accordion-button collapsed ps-4 pe-5" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse-{{ $date }}{{ $order->id }}" aria-expanded="false"
                  aria-controls="collapse-{{ $date }}{{ $order->id }}">
                  <div class="d-flex flex-column w-100">
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="fw-semibold h5 mb-0">Order #{{ $order->id }}</span>
                      <span
                        class="badge 
                        @if ($order->status == 'pending') bg-warning text-dark
                        @elseif($order->status == 'confirmed') bg-primary
                        @elseif($order->status == 'delivered') bg-success
                        @elseif($order->status == 'cancelled') bg-danger @endif">
                        {{ ucfirst($order->status) }}
                      </span>
                    </div>
                    <small class="text-muted">Shipping Address : {{ $order->shipping_address }}</small>
                  </div>
                </button>
              </h2>

              <div id="collapse-{{ $date }}{{ $order->id }}" class="accordion-collapse collapse"
                aria-labelledby="heading-{{ $date }}{{ $order->id }}"
                data-bs-parent="#orderAccordion-{{ $date }}">
                <div class="accordion-body">
                  <p class="h5"><strong>Items:</strong></p>
                  <ul>
                    @foreach ($order->device_variants as $device_variant)
                      @php
                        $variant_order = $device_variant->device_variant_orders->where('order_id', $order->id)->first();
                      @endphp
                      <li class="fs-5">{{ $device_variant->device->name }} (Qty:
                        {{ $variant_order->first()->quantity }})
                        - {{ number_format($variant_order->price, 0) }} MMK
                      </li>
                    @endforeach
                  </ul>
                  <p class="fs-5"><strong>Total:</strong> {{ number_format($order->total_price, 0) }} MMK</p>
                </div>
              </div>
            </div>
          @endforeach
          {{-- group by order id - end --}}
        </div>
        {{-- group by date - end --}}
      @endforeach
    @else
      <div class="alert alert-warning fs-5 text-center">No orders</div>
    @endif
  </div>
</x-auth.user.layout>
