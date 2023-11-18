@extends('frontend.layouts.app')
@section('title', 'Career')

@push('styles')
@endpush

@section('content')
<section id="home" class="container-fluid" desktop="{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}"
  tablet="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}"
  mobile="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}">
  <div class="row" style="display: flex; justify-content: center; align-items: center;">
    <div class="col-lg-8">
      <div style="display: flex; justify-content: center;">
        <img alt=" Gudang Garam" src="{{asset('assets/images/pjsp-logo.png')}}" style="height: 10rem;">
      </div>
      <p style="margin-top: 1rem; text-align: center; font-weight: 500;">
        <strong>PT Putera Jaya Sakti Perkasa</strong> adalah perusahaan yang memiliki komitmen dalam
        menciptakan lingkungan kerja yang memungkinkan setiap talenta talenta yang bekerja
        bersama di lingkungan PT. Putera Jaya Sakti Perkasa mampu memberikan kontribusi positif juga kinerja terbaiknya.
        Kesempatan kerja yang di berikan industri rokok PT. Putera Jaya Sakti Perkasa kepada masyarakat dapat dibilang
        sangat luas. Ratusan orang juga telah mendapatkan mata pencaharian mereka dari industri ini, baik sebagai tenaga
        kerja di pabrik, tenaga administrasi di kantor, sopir, satpam dan lain sebagainya. Sementara itu masih terdapat
        ratusan orang
        lainnya yang telah mendapatkan nafkah dari berbagai macam kegiatan yang langsung maupun tidak langsung
        berhubungan
        dengan industri rokok. Mulai dari para petani tembakau dan petani cengkeh, para pemetik daun tembakau dan
        pemetik cengkeh, angkutan, pekerja perusahaan percetakan, dll.
      </p>
    </div>
  </div>
</section>
@endsection