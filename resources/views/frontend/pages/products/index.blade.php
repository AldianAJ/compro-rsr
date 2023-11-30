@extends('frontend.layouts.app')
@section('title', 'Products')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
  integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<style>
  section.products_container,
  html,
  body,
  main {
    height: unset !important;
    min-height: 100vh !important;
  }

  .col-wrapper {
    /* margin-left: 3.25rem !important; */
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
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 1rem;
    margin-top: 2rem;
  }

  .content-wrapper .card img {
    /* width: 20rem; */
    width: 100%;
    height: 20rem;
  }

  select {
    display: none;
  }

  body>main>section>div>div.col-lg.col-wrapper>div:nth-child(3)>div>div {
    transform: none !important;
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
      display: none;
      /* gap: 1rem;
      overflow-x: scroll; */
    }

    /* .media-choose .box {
      padding: 0.5rem 4rem;
    }

    .media-choose .box h1 {
      text-wrap: nowrap;
      font-size: 1.2rem;
    } */

    .content-wrapper {
      grid-template-columns: 1fr 1fr;
    }

    .content-wrapper .card img {
      width: 100%;
      height: 100%;
    }

    select {
      display: block;
      width: 100%;
      padding: 0.5rem 1rem;
      border-radius: 5px;
    }
  }
</style>
@endpush

@section('content')
<section class="container-fluid products_container" style="background-color: #edeaea;">
  <div class="row">
    <div class="col-wrapper title">
      <p style="text-align: center;">{{$product_section?->content}}</p>
    </div>
    <div class="col-lg col-wrapper" x-data="{ open: '{{$brands[0]->slug}}' }">
      <div class="media-choose">
        @foreach ($brands as $item)
        <div class="box" @click="open = '{{$item->slug}}'" x-bind:class="open == '{{$item->slug}}' ? 'active' : ''">
          <h1>{{$item->brand_name}}</h1>
        </div>
        @endforeach
        {{-- <div class="box" @click="open = 'twizz_family'" x-bind:class="open == 'twizz_family' ? 'active' : ''">
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
        </div> --}}
      </div>
      <select x-model="open">
        @foreach ($brands as $item)
        <option value="{{$item->slug}}">{{$item->brand_name}}</option>
        @endforeach
      </select>
      <div class="content-wrapper">
        @foreach ($products as $item)
        <div class="card" x-show="open == '{{$item->brand->slug}}'">
          <a href="{{asset('storage/' . $item->image_url_detail)}}" data-lightbox="{{$item->product_name}}"
            data-title="{{$item->product_name}}">
            <img src="{{asset('storage/' . $item->image_url)}}" alt="{{$item->product_name}}">
          </a>
        </div>
        @endforeach
      </div>
      {{-- @foreach ($brands as $loopBrand)
      <div class="content-wrapper" x-show="open == '{{$loopBrand->slug}}'">
        @foreach ($loopBrand->products as $loopProduct)
        <div class="card">
          <a href="{{asset('storage/' . $loopProduct->image_url_detail)}}"
            data-lightbox="{{$loopProduct->product_name}}" data-title="{{$loopProduct->product_name}}">
            <img src="{{asset('storage/' . $loopProduct->image_url)}}" alt="{{$loopProduct->product_name}}">
          </a>
        </div>
        @endforeach
      </div>
      @endforeach --}}
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
  integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    });

    // $(document).ready(function(){
    //   $('.content-wrapper').slick({
    //     infinite: true,
    //     slidesToShow: 3,
    //     slidesToScroll: 3,
    //     centerMode: true,
    //     arrows: true,
    //     responsive: [
    //       {
    //         breakpoint: 768,
    //         settings: {
    //           arrows: false,
    //           centerMode: true,
    //           slidesToShow: 1
    //         }
    //       },
    //       {
    //         breakpoint: 480,
    //         settings: {
    //           arrows: false,
    //           centerMode: true,
    //           slidesToShow: 1
    //         }
    //       }
    //     ]
    //   });
    // });
</script>
@endpush