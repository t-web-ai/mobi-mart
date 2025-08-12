<style></style>
<x-auth.user.layout>
  <div class="container my-5">
    <form action="{{ route('orders.order') }}" method="POST" class="needs-validation" novalidate>
      @csrf
      <div class="mb-2">
        <x-form.textarea placeholder="e.g. Mandalay" name="shipping_address">Shipping Address</x-form.textarea>
      </div>
      <div class="mb-2">
        <x-form.tom :options="[
            ['id' => 'KPay', 'name' => 'KBZ PAY'],
            ['id' => 'Wave', 'name' => 'WAVE'],
            ['id' => 'Cash On Delivery', 'name' => 'Cash On Delivery'],
        ]" name="payment" placeholder="Payment"></x-form.tom>
      </div>
      <button type="submit" class="btn btn-primary fs-5">Place Order</button>
    </form>

    @if (session()->has('error'))
      <div class="alert alert-warning fs-5">{{ session('error') }}</div>
    @endif
  </div>

  <script>
    // Bootstrap 5 client-side validation example
    (() => {
      'use strict';

      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener(
          'submit',
          event => {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    })();
  </script>

</x-auth.user.layout>
