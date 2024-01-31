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
<video autoplay="autoplay" loop="loop" muted="muted" style="-o-filter: blur(0); filter: blur(0);">
  <source src="{{ asset('assets/video-drone.mp4') }}" type="video/mp4" />
</video>
@endsection