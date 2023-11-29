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
        padding: 1rem 2rem;
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

    .about_content {
        color: #fff;
        background-color: rgb(0 0 0 / 70%);
        padding: 0.5rem 1rem;
    }

    .content .content-wrapper h2 {
        background-color: #000;
        display: inline-block;
        padding-top: 0.2rem;
        padding-bottom: 0.2rem;
        padding-right: 0.5rem;
        padding-left: 2rem;
        margin-bottom: 1.5rem;
        margin-left: -2rem;
    }

    .history-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .history-content i {
        cursor: pointer;
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
<section id="home" class="container-fluid" desktop="{{ asset('assets/media/uploads/images/banner_tentangkami.jpg') }}"
    tablet="{{ asset('assets/media/uploads/images/banner-tentang-kami-m.jpg') }}"
    mobile="{{ asset('assets/media/uploads/images/banner-tentang-kami-m.jpg') }}">
    <div class="row row-wrapper">
        <div class="col-lg-6">
            <p class="about_content">{{$about_section_about_content?->content}}</p>
        </div>
    </div>
</section>
<section>
    <div class="content"
        style="background-image: url('{{ asset('assets/media/uploads/images/banner-kretek-m.jpg') }}')">
        <div class="visi_misi">
            <h1>{{$about_section_vision_content?->title}}</h1>
            <p style="margin-bottom: 1rem;">
                {{$about_section_vision_content?->content}}
            </p>
            <h1>{{$about_section_mission_content?->title}}</h1>
            <p style="margin-bottom: 1rem;">
                {{$about_section_mission_content?->content}}
            </p>
        </div>
        <div class="content-wrapper" x-data="{ open: 0 }">
            <div class="header">
                <h1>History of PJSP</h1>
                <p><span x-text="(open + 1)"></span>/{{count($about_section_history_content)}}</p>
            </div>
            @foreach ($about_section_history_content as $item)
            <h2 x-show="open == '{{$loop->index}}'">{{$item->year}}</h2>
            @endforeach
            <div class="history-content">
                <i class="fa-solid fa-chevron-left" @click="open--" x-show="open != 0"></i>
                @foreach ($about_section_history_content as $item)
                <p x-show="open == '{{$loop->index}}'">{{$item->content}}</p>
                @endforeach
                <i class="fa-solid fa-chevron-right" @click="open++"
                    x-show="open < '{{count($about_section_history_content) - 1}}'"></i>
            </div>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <iframe height="500"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7917.663090344349!2d111.888176!3d-7.145469!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e778226bc8e8697%3A0xb3ce907f355d77!2sPT.%20Putera%20Jaya%20Sakti%20Perkasa!5e0!3m2!1sid!2sid!4v1693062109681!5m2!1sid!2sid"
            style="border:0; width: 100%;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
@endsection

@push('scripts')
@endpush