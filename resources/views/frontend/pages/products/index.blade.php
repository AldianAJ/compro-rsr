@extends('frontend.layouts.app')
@section('title', 'Products')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
  integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  section.products_container,
  html,
  body,
  main {
    min-height: 100% !important;
  }

  .col-wrapper {
    margin-left: 3.25rem !important;
    margin-top: 4rem !important;
  }

  .col-wrapper:nth-child(2) {
    margin-top: 1rem !important;
    padding: 0 1rem;
  }

  .media-choose {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
  }

  .media-choose .box {
    width: 10rem;
    display: flex;
    justify-content: center;
    padding: 0.2rem 0;
    cursor: pointer;
    background-color: #fff;
    color: #cc3333;
  }

  .media-choose .box.active {
    background-color: #cc3333;
    color: #fff;
  }

  .media-choose .box h1 {
    font-size: 1.5rem;
    margin: 0;
  }

  .col-wrapper.title {
    display: flex;
    justify-content: center;
  }

  .col-wrapper.title p {
    width: 50%;
  }

  .content-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
  }

  .content-wrapper .card img {
    width: 20rem;
    height: 20rem;
  }

  @media (max-width: 575.98px) {
    .col-wrapper {
      margin-left: 1rem !important;
      margin-right: 1rem !important;
    }

    .col-wrapper.title p {
      text-align: justify !important;
      width: 100%;
    }

    .col-wrapper:nth-child(2) {
      padding: 0;
    }

    .media-choose {
      gap: 0;
    }

    .media-choose .box h1 {
      font-size: 1.2rem;
    }

    .content-wrapper {
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    .content-wrapper .card img {
      width: 100%;
      height: 100%;
    }
  }
</style>
@endpush

@section('content')
<section class="container-fluid products_container" style="background-color: #edeaea;">
  <div class="row">
    <div class="col-wrapper title">
      <p style="text-align: center;">
        <strong>PT. Putera Jaya Sakti Perkasa</strong> menggunakan tembakau pilihan dengan kualitas terbaik untuk
        menghasilkan produk
        yang
        berkualitas.
        Menciptakan produk berupa Sigaret Kretek Tangan (SKT) dan Sigaret Kretek Mesin (SKM) bermutu dan berkualitas
        tinggi.
      </p>
    </div>
    <div class="col-lg col-wrapper" x-data="{ open: 'twizz_family' }">
      <div class="media-choose">
        <div class="box" @click="open = 'twizz_family'" x-bind:class="open == 'twizz_family' ? 'active' : ''">
          <h1>TWIZZ FAMILY</h1>
        </div>
        <div class="box" @click="open = 'duff'" x-bind:class="open == 'duff' ? 'active' : ''">
          <h1>DUFF</h1>
        </div>
        <div class="box" @click="open = 'vortex'" x-bind:class="open == 'vortex' ? 'active' : ''">
          <h1>VORTEX</h1>
        </div>
        <div class="box" @click="open = 'kito'" x-bind:class="open == 'kito' ? 'active' : ''">
          <h1>KITO</h1>
        </div>
        <div class="box" @click="open = '363'" x-bind:class="open == '363' ? 'active' : ''">
          <h1>363</h1>
        </div>
      </div>
      <div class="content-wrapper" x-show="open == 'twizz_family'">
        <div class="card">
          <a href="{{asset('assets/images/products/1.png')}}" data-lightbox="products 1" data-title="products 1">
            <img src="{{asset('assets/images/products/1.png')}}" alt="products 1">
          </a>
        </div>
        <div class="card">
          <a href="{{asset('assets/images/products/2.png')}}" data-lightbox="products 2" data-title="products 2">
            <img src="{{asset('assets/images/products/2.png')}}" alt="products 2">
          </a>
        </div>
        <div class="card">
          <a href="{{asset('assets/images/products/3.png')}}" data-lightbox="products 3" data-title="products 3">
            <img src="{{asset('assets/images/products/3.png')}}" alt="products 3">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
  integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>
@endpush