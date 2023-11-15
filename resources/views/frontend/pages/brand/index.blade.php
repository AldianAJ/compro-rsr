@extends('frontend.layouts.app')
@section('title', 'Produk Kami')

@push('styles')
<style>
  .navbar-elixir {
    margin-bottom: 0 !important;
  }

  .hero_section {
    height: 100vh;
  }

  @media (max-width: 575.98px) {
    .hero_section {
      height: 50vh;
    }
  }

  .modal-backdrop {
    z-index: 0;
  }

  .product-card {
    overflow: hidden;
  }

  .product-card .lihat {
    display: none;
    background-color: #00000059;
    transition: 500ms;
  }

  .product-card:hover .lihat {
    display: flex;
  }
</style>
@endpush

@section('content')
<section class="color-white py-0" id="header-video">
  <div>
    <div class="background-holder" style="background-image:url({{asset('frontend/assets/images/bg-hero.jpg')}});"></div>
    {{-- <div class="background-holder" style="background-image:url(assets/images/video-1.html);">
      <video autoplay="autoplay" loop="loop" muted="muted" style="-o-filter: blur(0); filter: blur(0);">
        <source src="{{asset('frontend/assets/videos/home-intro.mp4')}}" type="video/mp4" />
      </video>
    </div> --}}
    <!--/.background-holder-->
    <div class="container" data-zanim-timeline="{}" data-zanim-trigger="scroll">
      <div class="row d-flex align-items-center hero_section">
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
<section class="background-white  text-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h3 class="color-primary fs-2 fs-lg-3">PRODUK KAMI</h3>
        <div class="px-lg-4 mt-3">
          {!!$section_produk->content!!}
        </div>
        <hr class="short"
          data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
          data-zanim-trigger="scroll" />
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
<section class="background-11 text-center">
  <div class="container">
    <h3 class="text-center fs-2 fs-md-3">{{$merk->brand_name}}</h3>
    <hr class="short"
      data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
      data-zanim-trigger="scroll" />
    <div class="row">
      @foreach ($produk as $item)
      <div class="col-6 col-lg-4 mb-4">
        <a href="#" data-toggle="modal" data-target="#modal_{{$loop->iteration}}">
          <div class="product-card background-white radius-secondary" style="position: relative">
            <div class="lihat"
              style="justify-content: center; flex-direction: column; position: absolute; top: 0; right: 0; bottom: 0; left: 0;">
              <h5 style="margin-bottom: 0; color: #fff;">Lihat</h5>
            </div>
            <img class="img-fluid radius-tr-secondary radius-tl-secondary radius-br-secondary radius-bl-secondary"
              src="{{asset('storage/' . $item->thumbnail_image_url)}}"
              style="width: 100%; height: 15rem; object-fit: cover;" alt="{{$item->product_name}}" />
          </div>
        </a>
      </div>
      {{-- modal --}}
      <div class="modal fade" id="modal_{{$loop->iteration}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="z-index: 100;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img class="img-thumbnail" src="{{asset('storage/' . $item->image_url)}}" alt="{{$item->product_name}}"
                style="width: 100%; height: 15rem; object-fit: cover;">
              <h5 class="mb-0 mt-3">{{$item->product_name}}</h5>
            </div>
          </div>
        </div>
      </div>
      {{-- modal --}}
      @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
      {{$produk->links()}}
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
@endsection