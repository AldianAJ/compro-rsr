@extends('frontend.layouts.app')
@section('title', 'About Us')

@push('styles')
<style>
  #home,
  html,
  body,
  main {
    height: unset !important;
  }

  #home .row {
    background-color: transparent;
    height: unset;
  }

  .row-wrapper {
    padding-left: 3.25rem !important;
    padding-top: 6rem !important;
    padding-bottom: 3rem;
  }

  .row-wrapper p {
    font-size: 1rem;
    font-weight: 500;
  }

  .content {
    position: relative;
    display: flex;
    justify-content: end;
    padding-left: 4.25rem !important;
    padding-top: 10rem !important;
    padding-bottom: 4rem !important;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .content .visi_misi {
    width: 40%;
    background-color: rgb(0 0 0 / 70%);
    position: absolute;
    right: 2rem;
    top: -7rem;
    padding: 0.5rem 1rem;
  }

  .content .visi_misi h1 {
    text-align: center;
    font-size: 1.5rem;
    margin: 0;
  }

  .content .visi_misi p {
    text-align: justify;
    font-size: 0.8rem;
    margin: 0;
  }

  .content .visi_misi h1,
  .content .visi_misi p {
    color: #fff;
  }

  .content .content-wrapper {
    background-color: #fff;
    width: 50%;
    padding: 1rem;
  }

  .content .content-wrapper .header {
    display: flex;
    justify-content: space-between;
    align-items: end;
    margin-bottom: 1rem;
  }

  .content .content-wrapper p {
    text-align: justify;
    margin-bottom: 0;
  }


  .content .content-wrapper h1,
  .content .content-wrapper h2 {
    font-size: 1.5rem;
    color: #d64c42;
    margin: 0;
    font-weight: 700;
  }

  .content .content-wrapper h2 {
    background-color: #000;
    display: inline-block;
    padding-top: 0.2rem;
    padding-bottom: 0.2rem;
    padding-right: 0.5rem;
    padding-left: 2rem;
    margin-bottom: 1.5rem;
    margin-left: -1rem;
  }

  @media (max-width: 575.98px) {
    .row-wrapper {
      padding-left: 1rem !important;
      padding-right: 1rem !important;
    }

    .row-wrapper p {
      text-align: justify !important;
    }

    .content .visi_misi {
      width: 100%;
      position: static !important;
    }

    .content {
      justify-content: start;
      flex-direction: column;
      gap: 1rem;
      padding-top: 4rem !important;
      padding-left: 1rem !important;
      padding-right: 1rem !important;
    }

    .content .content-wrapper {
      width: 100%;
    }
  }
</style>
@endpush

@section('content')
<section id="home" class="container-fluid" desktop="{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}"
  tablet="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}"
  mobile="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}">
  <div class="row row-wrapper">
    <div class="col-lg-6">
      <p>
        <strong>PT Putera Jaya Sakti Perkasa</strong> menjalankan bisnisnya
        dengan profesionalitas dan didukung oleh tenaga produksi
        dan manajerial yang handal. Seiring perkembangan zaman
        dan sesuai visi misi perusahaan, maka kami bertekad untuk
        terus melakukan perubahan dan inovasi demi menjadi perusahaan
        yang handal dan mampu mencakup pasar nasional.
      </p>
    </div>
  </div>
</section>
<section>
  <div class="content" style="background-image: url('{{asset('assets/media/uploads/images/banner-kretek-m.jpg')}}')">
    <div class="visi_misi">
      @foreach ($section_visi_misi_content as $item)
      <h1>{!! $item->title !!}</h1>
      <p style="margin-bottom: 1rem;">
        {!! $item->content_value !!}
      </p>
      @endforeach
    </div>
    <div class="content-wrapper">
      <div class="header">
        <h1>History of PJSP</h1>
        <p>1/10</p>
      </div>
      <h2>2014</h2>
      <p>
        Pada Tahun 1960 telah berdiri CV. Podo Tresno yang bergerak di bidang Trading
        Tembakau yang dijalankan oleh orang tua dari Bapak Santjoko dan
        Bapak Fx. Iswanto. Pada Tahun 1982 terjadi perubahan manajemen dan pergantian
        nama perusahaan menjadi CV. Putra Bakti Utama dengan di pimpin Bapak Fx. Iswanto
        dan Bapak Santjoko, hingga saat ini masih tetap berjalan di bidang Trading Tembakau.
        Pada tahun 2014, CV. Putra Bakti Utama mengembangkan bisnis usahanya
        di bidang rokok dengan nama PT Putra Jaya Sakti Perkasa yang saat itu hanya
        memproduksi rokok SKT (Sigarete Kretek Tangan). Pabrik rokok ini berada
        di kawasan Bojonegoro dan dipimpin oleh Bapak Fx. Iswanto selaku Direktur,
        Bapak Juli Utama dan Bapak Santjoko selaku Komisaris. Bapak Fx. Iswanto
        terus bekerja sama membangun dan mengembangkan perusahaan rokok
        di daerah ini untuk terus tumbuh agar bisa masuk di skala nasional.
      </p>
    </div>
  </div>
</section>
@endsection

@push('scripts')
@endpush