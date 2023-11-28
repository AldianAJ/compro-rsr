@extends('frontend.layouts.app')
@section('title', 'Media')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
        integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html,
        body,
        main,
        #home,
        #home .row {
            height: unset !important;
            min-height: 100vh !important
        }

        .col-wrapper {
            margin-left: 3.25rem !important;
            margin-top: 4rem !important;
            margin-bottom: 1rem;
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
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .content-wrapper .card {
            display: flex;
            gap: 1rem;
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

        @media (max-width: 575.98px) {

            html,
            body,
            main {
                height: max-content;
                min-height: 100%;
            }

            .col-wrapper {
                margin-left: 1rem !important;
                margin-right: 1rem !important;
            }

            .media-choose {
                justify-content: center;
            }

            .content-wrapper .card {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <section id="home" class="container-fluid" desktop="{{ asset('assets/images/bg-pasinan-coridor.jpg') }}"
        tablet="{{ asset('assets/images/bg-pasinan-coridor.jpg') }}"
        mobile="{{ asset('assets/images/bg-pasinan-coridor.jpg') }}">
        <div class="row">
            <div class="col-lg-8 col-wrapper" x-data="{ open: 'NEWS' }">
                <div class="media-choose">
                    <div class="box" @click="open = 'NEWS'" x-bind:class="open == 'NEWS' ? 'active' : ''">
                        <h1>NEWS</h1>
                    </div>
                    <div class="box" @click="open = 'TVC'" x-bind:class="open == 'TVC' ? 'active' : ''">
                        <h1>TVC</h1>
                    </div>
                </div>
                <div class="content-wrapper">
                    @foreach ($medias as $item)
                        <div class="card" x-show="open == '{{ $item->category }}'">
                            <iframe src="https://www.youtube.com/embed/{{ $item->url }}" width="400"
                                height="300"></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
        integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
@endpush
