<x-auth.admin.layout title="Sales Rate" name="Sales">
  <!-- content - start -->
  <div class="container">
    <div class="row justify-content-center pt-4 align-items-stretch px-3">
      <div class="p-2 py-2 col-12 col-sm-6 d-flex flex-column">
        <div class="p-4 bg-light-subtle text-body rounded shadow flex-fill d-flex flex-column justify-content-between">
          <div>
            <div class="fs-1 fw-bold">{{ number_format($sale) }}</div>
            <div class="fs-5">Products Sold</div>
          </div>
        </div>
      </div>

      <div class="p-2 py-2 col-12 col-sm-6 d-flex flex-column">
        <div class="p-4 bg-light-subtle text-body rounded shadow flex-fill d-flex flex-column justify-content-between">
          <div>
            <div class="fs-1 fw-bold">{{ number_format($order) }}</div>
            <div class="fs-5">Avg. Order</div>
          </div>
        </div>
      </div>

      <div class="p-2 py-2 col-12 col-sm-12 d-flex flex-column">
        <div class="p-4 bg-secondary-subtle text-body rounded  flex-fill d-flex flex-column justify-content-between">
          <div>
            <div class="fs-1 fw-bold">{{ number_format($total, 0) }} MMK</div>
            <div class="fs-5">Total Revenue</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content - end -->
</x-auth.admin.layout>
