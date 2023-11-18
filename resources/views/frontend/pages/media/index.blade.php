@extends('frontend.layouts.app')
@section('title', 'Media')

@push('styles')
<style>
  #home,
  html,
  body,
  main {
    min-height: 100% !important;
  }

  .col-wrapper {
    margin-left: 3.25rem !important;
    margin-top: 4rem !important;
  }

  .media-choose {
    display: flex;
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

  .content-wrapper {
    margin-top: 2rem;
  }

  .content-wrapper .card {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
  }

  .content-wrapper .card h1 {
    margin: 0;
    font-size: 1.2rem;
  }

  .content-wrapper .card p {
    margin-bottom: 0;
    margin-top: 0.5rem;
    font-size: 0.8rem;
  }

  .content-wrapper .card a {
    font-size: 0.8rem;
    text-decoration: none;
    color: #3d3d3d;
  }
</style>
@endpush

@section('content')
<section id="home" class="container-fluid" desktop="{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}"
  tablet="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}"
  mobile="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}">
  <div class="row">
    <div class="col-lg-8 col-wrapper" x-data="{ open: 'news' }">
      <div class="media-choose">
        <div class="box" @click="open = 'news'" x-bind:class="open == 'news' ? 'active' : ''">
          <h1>NEWS</h1>
        </div>
        <div class="box" @click="open = 'tvc'" x-bind:class="open == 'tvc' ? 'active' : ''">
          <h1>TVC</h1>
        </div>
      </div>
      <div class="content-wrapper" x-show="open == 'news'">
        <div class="card">
          <img src="{{asset('assets/images/media/media-test.png')}}" alt="media-test">
          <div>
            <h1>Berbakti kasih bersama GKJTU Teuku Umar</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, culpa, fuga esse blanditiis voluptatum
              in quisquam enim voluptatibus atque voluptates cupiditate repellendus dicta dolor quod iste, ipsum sequi
              velit similique....</p>
            <a href="#">baca artikel selengkapnya</a>
          </div>
        </div>
        <div class="card">
          <img src="{{asset('assets/images/media/media-test.png')}}" alt="media-test">
          <div>
            <h1>Berbakti kasih bersama GKJTU Teuku Umar</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, culpa, fuga esse blanditiis voluptatum
              in quisquam enim voluptatibus atque voluptates cupiditate repellendus dicta dolor quod iste, ipsum sequi
              velit similique....</p>
            <a href="#">baca artikel selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="content-wrapper" x-show="open == 'tvc'">
        <div class="card">
          <img src="{{asset('assets/images/media/media-test.png')}}" alt="media-test">
          <div>
            <h1>Berbakti kasih bersama GKJTU Teuku Umar</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, culpa, fuga esse blanditiis voluptatum
              in quisquam enim voluptatibus atque voluptates cupiditate repellendus dicta dolor quod iste, ipsum sequi
              velit similique....</p>
            <a href="#">baca artikel selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
@endpush