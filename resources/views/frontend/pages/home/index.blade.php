@extends('frontend.layouts.app')
@section('title', 'Home')

@push('styles')
<style>
  html,
  body,
  main {
    height: unset !important;
  }

  main {
    overflow-x: hidden;
  }

  video {
    width: 100vw;
  }

  footer {
    padding: 1rem 0;
    margin-top: -0.4rem;
    background-color: #b92025;
  }

  @media (max-width: 575.98px) {
    video {
      width: unset !important;
      height: 100vh;
      margin-left: -10rem;
    }
  }
</style>
@endpush

@section('content')
{{-- <section id="home" class="container-fluid"
  desktop="{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}"
  tablet="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}"
  mobile="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}">
  <div class="row">
    <div class="col-md-6 col-lg-6 visible-md visible-lg" style="height:100%;">
      <div class="quotes">
        <p id="quote">&nbsp;</p>
      </div>
    </div>
  </div>
</section> --}}
<video autoplay="autoplay" loop="loop" muted="muted" style="-o-filter: blur(0); filter: blur(0);">
  <source src="{{ asset('assets/video-drone.mp4') }}" type="video/mp4" />
</video>
@endsection