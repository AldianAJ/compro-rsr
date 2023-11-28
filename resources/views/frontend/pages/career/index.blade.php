@extends('frontend.layouts.app')
@section('title', 'Career')

@push('styles')
<style>
  p {
    color: #fff;
    background-color: rgb(0 0 0 / 70%);
    padding: 0.5rem 1rem;
  }

  @media (max-width: 575.98px) {
    #home img {
      height: 6rem !important;
    }

    #home p {
      text-align: justify !important;
      padding: 0 1rem;
    }

    .row {
      padding-left: 1rem !important;
      padding-right: 1rem !important;
    }
  }
</style>
@endpush

@section('content')
<section id="home" class="container-fluid" desktop="{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}"
  tablet="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}"
  mobile="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}">
  <div class="row" style="display: flex; justify-content: center; align-items: center;">
    <div class="col-lg-8">
      <div style="display: flex; justify-content: center;">
        <img alt="Gudang Garam" src="{{asset('assets/images/pjsp-logo.png')}}" style="height: 10rem;">
      </div>
      <p style="margin-top: 1rem; text-align: center; font-weight: 500;">{{$career_section?->content}}</p>
    </div>
  </div>
</section>
@endsection