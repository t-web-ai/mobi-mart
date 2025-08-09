<style>
  input:focus,
  textarea:focus,
  select:focus {
    outline: none !important;
    box-shadow: none !important;
    border-color: inherit !important;
  }

  .carousel-inner {
    height: 50vh;
  }

  @media screen and (min-width: 576px) {
    .carousel-inner {
      height: 60vh;
    }
  }

  .carousel-item {
    width: 100%;
    height: 100%;
    padding: 15px;
    background-color: white;
  }

  .carousel-item>img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  html[data-bs-theme=""] .carousel-indicators [data-bs-target] {
    width: 10px !important;
    height: 10px !important;
    background-color: black;
    border-radius: 50%;
    margin: 0 4px;
    opacity: 0.5;
    transition: opacity 0.3s, background-color 0.3s;
    border: none;
  }

  .carousel-indicators {
    margin-top: 20px;
  }

  html[data-bs-theme="dark"] .carousel-indicators [data-bs-target] {
    width: 10px !important;
    height: 10px !important;
    background-color: white;
    border-radius: 50%;
    margin: 0 4px;
    opacity: 0.5;
    transition: opacity 0.3s, background-color 0.3s;
    border: none;
  }

  html[data-bs-theme=""] .carousel-indicators .active {
    background-color: black;
    opacity: 1;
  }

  html[data-bs-theme="dark"] .carousel-indicators .active {
    background-color: white;
    opacity: 1;
  }
</style>
<x-auth.user.layout>
  <!-- image slide - start -->
  <div class="bg-dark text-white shadow fs-5 p-2 d-flex justify-content-between align-items-center">
    <div>Popular mobile devices </div>
  </div>
  <div class="carousel slide" id="popular" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assets/img/popular/apple-iphone-17-pro-max-r1.jpg" />
      </div>
      <div class="carousel-item">
        <img src="/assets/img/popular/samsung-galaxy-m33-1.jpg" />
      </div>
      <div class="carousel-item">
        <img src="/assets/img/popular/samsung-galaxy-m33-3.jpg" />
      </div>
      <div class="carousel-item">
        <img src="/assets/img/popular/xiaomi-redmi-note-14-pro-5g-gl-1.jpg" />
      </div>
    </div>
    <div class="carousel-indicators position-relative p-2">
      <button data-bs-slide-to="0" class="active" data-bs-target="#popular"></button>
      <button data-bs-slide-to="1" data-bs-target="#popular"></button>
      <button data-bs-slide-to="2" data-bs-target="#popular"></button>
      <button data-bs-slide-to="3" data-bs-target="#popular"></button>
    </div>
  </div>
  <div class="d-flex justify-content-center flex-wrap gap-2 p-2">
    <a href="" class="fs-5 text-decoration-none btn btn-warning flex-grow-1 flex-md-grow-0">
      <span>Cart</span>
    </a>
    <a href="" class="fs-5 text-decoration-none btn btn-warning flex-grow-1 flex-md-grow-0">
      <span>Collection</span>
    </a>
    <a href="" class="fs-5 text-decoration-none btn btn-warning flex-grow-1 flex-md-grow-0">
      <span>History</span>
    </a>
    <a href="" class="fs-5 text-decoration-none btn btn-warning flex-grow-1 flex-md-grow-0">
      <span>Get Started</span>
    </a>
  </div>
  <!-- image slide - end -->
</x-auth.user.layout>
