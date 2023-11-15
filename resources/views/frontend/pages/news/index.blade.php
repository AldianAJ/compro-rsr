@extends('frontend.layouts.app')
@section('title', 'Berita')

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
        <h3 class="color-primary fs-2 fs-lg-3">BERITA</h3>
        <hr class="short"
          data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
          data-zanim-trigger="scroll" />
      </div>
    </div>
    <div class="row mt-lg-6">
      @foreach($berita as $item)
      <div class="col-12 col-lg-4 py-0 mt-4 mt-lg-0">
        <div class="background-white pb-4 h-100 radius-secondary">
          <a class="video-modal" href="https://www.youtube.com/watch?v={{$item->url}}" data-start="16" data-end="168">
            <div>
              <iframe src="https://www.youtube.com/embed/{{$item->url}}"
                class="w-100 radius-tr-secondary radius-tl-secondary" height="200"
                style="pointer-events: none;"></iframe>
              {{-- <iframe src="{{$item->url}}" class="w-100 radius-tr-secondary radius-tl-secondary" height="200"
                style="pointer-events: none;" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe> --}}
            </div>
            {{-- <div>
              <iframe class="w-100 radius-tr-secondary radius-tl-secondary" height="200" style="pointer-events: none;"
                src="https://www.youtube.com/embed/jr2ABI1hMJc?si=KpPeBMCxTNBzkAoE" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div> --}}
            {{-- <img class="w-100 radius-tr-secondary radius-tl-secondary"
              src="{{asset('frontend/assets/images/9.jpg')}}" alt="Featured Image" /> --}}
          </a>
          <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div class="overflow-hidden">
              <h5 data-zanim='{"delay":0}'>{{$item->title}}</h5>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
      {{$berita->links()}}
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
@endsection