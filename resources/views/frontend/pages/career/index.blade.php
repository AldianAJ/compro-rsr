@extends('frontend.layouts.app')
@section('title', 'Career')



@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
  html,
  body,
  main,
  #home,
  #home .career_content {
    height: unset !important;
    min-height: 100vh !important
  }

  .navbar-fixed-top {
    z-index: unset !important;
  }

  .career_content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    padding-top: 6rem !important;
    padding-bottom: 3rem !important;
  }

  .career_content .card {
    height: fit-content;
    display: flex;
    border-radius: 5px;
    overflow: hidden;
  }

  .career_content .card img {
    width: 15rem;
    /* height: 15rem; */
    object-fit: cover;
  }

  .career_content .card div {
    width: 100%;
    background-color: #fff;
    padding: 1rem;
  }

  .career_content .card .content {
    padding: 0;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
  }

  .career_content .card h1 {
    font-size: 1.5rem;
    margin: 0;
    margin-bottom: 0.5rem;
  }

  .career_content .card p {
    font-size: 0.8rem;
  }

  .modal img {
    width: 100%;
    /* height: 15rem; */
    object-fit: cover;
    border-radius: 5px;
    margin-bottom: 1rem;
  }

  @media (max-width: 575.98px) {
    .career_content {
      grid-template-columns: 1fr;
    }

    .career_content .card {
      flex-direction: column;
    }

    .career_content .card img {
      width: 100%;
    }
  }
</style>
@endpush

@section('content')
<section id="home" class="container-fluid" desktop="{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}"
  tablet="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}"
  mobile="{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}">
  <div class="career_content">
    @foreach ($career_section as $item)
    <div class="card">
      <img src="{{asset('storage/' . $item->image)}}" alt="{{$item->section}}">
      <div>
        <h1>{{$item->section}}</h1>
        <div class="content">
          {!!$item->content!!}
        </div>
        <a href="#modal-{{$item->id}}" rel="modal:open">{{$current_lang->code == 'ID' ? 'selengkapnya' :
          'detail'}}</a>
      </div>
    </div>
    <div id="modal-{{$item->id}}" class="modal">
      <img src="{{asset('storage/' . $item->image)}}" alt="{{$item->section}}">
      <div class="content">
        {!!$item->content!!}
      </div>
      <a href="#" rel="modal:close">Close</a>
    </div>
    @endforeach
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
@endpush