@extends('frontend.layouts.app')
@section('title', 'Tentang Kami')

@push('styles')
<style>
  .navbar-elixir {
    margin-bottom: 0 !important;
  }

  .hero_section {
    height: 100vh;
  }

  .control_select {
    display: none;
  }

  @media (max-width: 575.98px) {
    .hero_section {
      height: 50vh;
    }

    .control_select {
      display: block;
    }

    .control_button {
      display: none;
    }
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
<section class="background-11">
  {{-- <img src="{{asset('frontend/assets/images/bakau-bg-l-to-r.png')}}" alt="gambar corak daun bakau"
    style="height: 20rem; position: absolute; left: -2rem; bottom: 0; z-index: 50;"> --}}
  <div class="container">
    <div class="row" x-data="{ open: '{{$section_histori[0]->year}}' }">
      <div class="col-12">
        <h3 class="text-center fs-2 fs-md-3">PERJALANAN PT. SINAR SURYA TEMBAKAU</h3>
        <hr class="short"
          data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
          data-zanim-trigger="scroll" />
      </div>
      <div class="col-lg-3 mb-3">
        <div class="background-white px-3 px-0 py-5 px-lg-5 radius-secondary text-center control_button">
          <h6 class="mb-3">Tahun Perjalanan</h6>
          @foreach($section_histori as $item)
          <button @click="open = '{{$item->year}}'" type="button"
            x-bind:class="open == '{{$item->year}}' ? 'bg-secondary text-white' : ''"
            class="btn btn-outline-secondary d-block mx-auto mb-2">{{$item->year}}</button>
          @endforeach
        </div>
        <div class="background-white px-3 px-0 py-5 px-lg-5 radius-secondary text-center control_select">
          <h6 class="mb-3">Tahun Perjalanan</h6>
          <div class="form-group">
            <select x-model="open" class="form-control" id="exampleFormControlSelect1">
              @foreach($section_histori as $item)
              <option>{{$item->year}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col">
        @foreach($section_histori as $item)
        <div class="background-white px-3 px-0 py-5 px-lg-5 radius-secondary" x-show="open == '{{$item->year}}'">
          <h5 class="text-center">{{$item->year}}</h5>
          @if(!empty($item->image_url))
          <div class="d-flex justify-content-center mb-4">
            <img class="radius-secondary" style="height: 25rem; object-fit: cover;"
              src="{{asset('storage/' . $item->image_url)}}" alt="" />
          </div>
          @endif
          <div class="mt-3">
            {!! $item->content !!}
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
<section class="background-11">
  {{-- <img src="{{asset('frontend/assets/images/bakau-bg-l-to-r.png')}}" alt="gambar corak daun bakau"
    style="height: 20rem; position: absolute; left: -2rem; bottom: 0; z-index: 50;"> --}}
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-center fs-2 fs-md-3">VISI & MISI PERUSAHAAN</h3>
        <hr class="short"
          data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
          data-zanim-trigger="scroll" />
      </div>
      <div class="col-12">
        <div class="background-white px-3 px-0 py-5 px-lg-5 radius-secondary">
          <h5 class="text-center">VISI</h5>
          <div class="mt-3">{!!$section_visi->content!!}</div>
        </div>
        <div class="background-white px-3 mt-4 px-0 py-5 px-lg-5 radius-secondary">
          <h5 class="text-center">MISI</h5>
          <div class="mt-3">{!!$section_misi->content!!}</div>
        </div>
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
<section class="background-11">
  {{-- <img src="{{asset('frontend/assets/images/bakau-bg-l-to-r.png')}}" alt="gambar corak daun bakau"
    style="height: 20rem; position: absolute; right: -2rem; bottom: 0; transform: scaleX(-1); z-index: 50;"> --}}
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-center fs-2 fs-md-3">{{$section_budaya_kerja->section}}</h3>
        <hr class="short"
          data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
          data-zanim-trigger="scroll" />
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-6">
        <img class="radius-secondary" src="{{asset('storage/' . $section_budaya_kerja->image_url)}}" alt="" />
      </div>
      <div class="col-lg-6 px-lg-5 mt-6 mt-lg-0" data-zanim-timeline="{}" data-zanim-trigger="scroll">
        <div>{!!$section_budaya_kerja->content!!}</div>
        {{-- <div class="overflow-hidden">
          <div class="px-4 px-sm-0" data-zanim='{"delay":0}'>
            <h5 class="fs-0 fs-lg-1">
              <span class="ion-chatbubble-working fs-2 mr-2 icon-position-fix fw-800"></span>Integritas
            </h5>
            <p class="mt-2 px-lg-3">
              Selaras antara hati, pikiran, perkataan dan perbuatan yang baik dan benar.
            </p>
          </div>
        </div>
        <div class="overflow-hidden mt-4">
          <div class="px-4 px-sm-0" data-zanim='{"delay":0}'>
            <h5 class="fs-0 fs-lg-1">
              <span class="ion-chatbubble-working fs-2 mr-2 icon-position-fix fw-800"></span>Profesionalitas
            </h5>
            <p class="mt-2 px-lg-3">
              Bekerja secara disiplin, kompeten dan tepat waktu dengan hal terbaik.
            </p>
          </div>
        </div>
        <div class="overflow-hidden mt-4">
          <div class="px-4 px-sm-0" data-zanim='{"delay":0}'>
            <h5 class="fs-0 fs-lg-1">
              <span class="ion-chatbubble-working fs-2 mr-2 icon-position-fix fw-800"></span>Inovasi
            </h5>
            <p class="mt-2 px-lg-3">
              Menyempurnakan yang sudah ada dan menciptakan kreasi yang baru untuk menjadi lebih baik.
            </p>
          </div>
        </div>
        <div class="overflow-hidden mt-4">
          <div class="px-4 px-sm-0" data-zanim='{"delay":0}'>
            <h5 class="fs-0 fs-lg-1">
              <span class="ion-chatbubble-working fs-2 mr-2 icon-position-fix fw-800"></span>Tanggung jawab
            </h5>
            <p class="mt-2 px-lg-3">
              Bekerja secara tuntas dan konsekuen.
            </p>
          </div>
        </div>
        <div class="overflow-hidden mt-4">
          <div class="px-4 px-sm-0" data-zanim='{"delay":0}'>
            <h5 class="fs-0 fs-lg-1">
              <span class="ion-chatbubble-working fs-2 mr-2 icon-position-fix fw-800"></span>Keteladanan
            </h5>
            <p class="mt-2 px-lg-3">
              Menjadi contoh yang baik bagi orang lain.
            </p>
          </div>
        </div> --}}
      </div>
    </div>
    <!--/.row-->
  </div>
  <!--/.container-->
</section>
<section class="background-11" style="padding-bottom: 0;">
  {{-- <img src="{{asset('frontend/assets/images/bakau-bg-l-to-r.png')}}" alt="gambar corak daun bakau"
    style="height: 20rem; position: absolute; right: -2rem; bottom: 0; transform: scaleX(-1); z-index: 50;"> --}}
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-center fs-2 fs-md-3">LOKASI</h3>
        <hr class="short"
          data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}'
          data-zanim-trigger="scroll" />
      </div>
    </div>
    <!--/.row-->
  </div>
  <iframe class="w-100" height="500"
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7917.663090344349!2d111.888176!3d-7.145469!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e778226bc8e8697%3A0xb3ce907f355d77!2sPT.%20Putera%20Jaya%20Sakti%20Perkasa!5e0!3m2!1sid!2sid!4v1693062109681!5m2!1sid!2sid"
    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <!--/.container-->
</section>
@endsection