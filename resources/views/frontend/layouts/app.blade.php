@php
    use App\Models\Lang;

    $langs = Lang::get();
    $cuurent_lang = $_GET['lang'] ?? $langs[0]->code;
@endphp

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="PT. Rajawali Sumber Rejeki">
    <meta name="title" content="PT. Rajawali Sumber Rejeki">
    <meta name="description"
        content="PT Rajawali Sumber Rejeki menjalankan bisnisnya
    dengan profesionalitas dan didukung oleh tenaga produksi
    dan manajerial yang handal. Seiring perkembangan zaman
    dan sesuai visi misi perusahaan, maka kami bertekad untuk
    terus melakukan perubahan dan inovasi demi menjadi perusahaan
    yang handal dan mampu mencakup pasar nasional.
    ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ env('APP_NAME', 'PT. Rajawali Sumber Rejeki') }} | @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/rajawali.ico') }}" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="{{ asset('assets/javascripts/main.js') }}"></script>
    <script src="{{ asset('assets/javascripts/customffaf.js?v=1.4') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/node_modules/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/javascripts/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('assets/javascripts/jquery.localscroll-1.2.7-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/node_modules/jquery-lazy/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/node_modules/jquery-fancybox/source/js/jquery.fancybox.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js') }}">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIwO80xzkuM314AsVjaq9LbHLna6ATfbI"></script>
    <script type="text/javascript" src="{{ asset('assets/javascripts/infobox.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YH4LVQ9FK3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-YH4LVQ9FK3');
    </script>

    <style>
        #home {
            background-position: center !important;
            background-size: cover !important;
        }

        @media (min-width: 992px) {
            #topbar {
                margin-left: 0 !important;
            }
        }

        .navbar-brand {
            height: unset !important;
            display: flex !important;
            align-items: center;
            margin-left: 1rem !important;
            background-color: #000;
            color: #fff;
            padding: 0.4rem 1rem !important;
        }

        .navbar-brand img {
            height: 2.5rem;
            margin-right: 1rem;
        }

        .navbar-brand h1 {
            font-size: 1rem !important;
            margin: 0 !important;
        }

        #topbar {
            height: unset !important;
            position: relative !important;
            background-color: #000;
        }

        .navbar-header {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000;
        }

        .navbar-header ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
            margin-bottom: 0;
        }

        .navbar-header i {
            display: none;
        }

        @media (max-width: 575.98px) {
            .navbar-header i {
                display: block;
            }

            .navbar-header ul {
                visibility: hidden;
                position: absolute;
                top: 2.8rem;
                right: -1rem;
                background-color: #000;
                padding-left: 0;
                padding: 1rem 2.5rem;
                flex-direction: column;
            }

            .navbar-header.active ul {
                visibility: visible !important;
            }
        }

        .navbar-header ul li a {
            color: #fff;
            font-size: 1rem;
        }

        .navbar-header ul li a:hover {
            color: #fff;
        }

        .navbar-header:after,
        .navbar-header:before {
            content: unset !important;
        }

        .navbar-header .dropdown {
            position: relative;
        }

        .navbar-header .dropdown a {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-header .dropdown i {
            display: block;
            font-size: 0.8rem;
        }


        .navbar-header .dropdown .menu {
            background-color: #b92025;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            position: absolute;
            top: 2.2rem;
            left: 0;
            padding-left: 0;
            padding: 0.5rem;
        }

        footer {
            padding: 0.5rem 0;
            background-color: #b92025;
        }

        footer p {
            font-size: 0.8rem;
            text-align: center;
            margin-bottom: 0;
            color: #fff;
        }
    </style>
    @stack('styles')
</head>

<body>
    <header>
        <nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
            <div id="topbar" class="container-fluid" x-data="{ open: false, langOpen: false, productOpen: false }">
                <div class="navbar-header" x-bind:class="open ? 'active' : ''">
                    <a class="navbar-brand" href="{{ route('frontend.home', ['lang' => $cuurent_lang]) }}">
                        <img alt="Rajawali Sumber Rejeki" src="{{ asset('assets/images/logo-rajawali.png') }}">
                        <h1><b>PT. RAJAWALI SUMBER REJEKI</b></h1>
                    </a>
                    <i class="fa-solid fa-bars" @click="open = !open"
                        style="font-size:1.5rem; color:#fff; cursor: pointer;"></i>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.about', ['lang' => $cuurent_lang]) }}">About Us</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" @click="productOpen = !productOpen">
                                    Cigarette
                                    <i class="fa-solid fa-chevron-down"></i>
                                </a>
                                <ul class="menu" x-show="productOpen">
                                    <li>
                                        <a class="item"
                                            href="{{ route('frontend.products', ['lang' => $cuurent_lang, 'category' => 'Cigarette']) }}">National</a>
                                    </li>
                                    <li>
                                        <a class="item"
                                            href="{{ route('frontend.products', ['lang' => $cuurent_lang, 'category' => 'Export']) }}">Export</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('frontend.media', ['lang' => $cuurent_lang]) }}">Media</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.career', ['lang' => $cuurent_lang]) }}">Career</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#" @click="langOpen = !langOpen">
                                    Language
                                    <i class="fa-solid fa-chevron-down"></i>
                                </a>
                                <ul class="menu" x-show="langOpen">
                                    @foreach ($langs as $lang)
                                        <li><a class="item"
                                                href="?lang={{ $lang->code }}">{{ $lang->language }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p style="margin-top: 0.2rem; font-size: 14px;">
            &copy; Copyright PT Rajawali Sumber Rejeki
        </p>
    </footer>
    <script>
        function getCookie(name) {
            var cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = jQuery.trim(cookies[i]);
                    // Does this cookie string begin with the name we want?
                    if (cookie.substring(0, name.length + 1) === (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }

        var csrftoken = getCookie('csrftoken');

        function csrfSafeMethod(method) {
            // these HTTP methods do not require CSRF protection
            return (/^(GET|HEAD|OPTIONS|TRACE)$/.test(method));
        }

        $.ajaxSetup({
            beforeSend: function(xhr, settings) {
                if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
                    xhr.setRequestHeader("X-CSRFToken", csrftoken);
                }
            }
        });

        function post(url, data) {
            event.preventDefault();
            var values = data;
            values.push({
                csrfmiddlewaretoken: csrftoken
            });
            $.ajax({
                method: "POST",
                url: url,
                data: values
            }).done(function(result) {
                return result;
            });
            return false;
        }
    </script>

    <script type="application/javascript">
        var wSize = $(document).width()

    $(function () {
      $('#home').lazy({ afterLoad: function (element) { console.log('afterLoad'); } });
    });

    //click Scrollstart
    $('#start').click(function () { $('#home .row').addClass('animated fadeOutUp'); });

    //check last page visited by referer
    $(document).ready(function () {
      var getUrl = window.location, baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('index.html')[1];
      var referer = 'None', ref = referer.substring(baseUrl.length);
      var itemMenu = $('#menus').find("[data-menu='/" + ref + "']"),
        linkItemMenu = itemMenu.attr('href');
      itemMenu.removeClass(); //remove parent class 'collapsed'
      if (itemMenu.attr('data-sub') == 'sub') $(linkItemMenu).addClass('in'); //add target link class be 'collapsed in'
    });

    document.getElementById('home').style.backgroundImage = 'url("{{asset('assets/images/bg-coridor.jpg')}}")';
    if (wSize <= 768) document.getElementById('home').style.backgroundImage = 'url("{{asset('assets/images/bg-coridor.jpg')}}")';
    if (wSize <= 640) document.getElementById('home').style.backgroundImage = 'url("{{asset('assets/images/bg-coridor.jpg')}}")';

    function bgChange(img) {
      image = 'url("{{asset('assets/images/bg-coridor.jpg')}}")';
      if (wSize <= 768) { image = 'url("{{asset('assets/images/bg-coridor.jpg')}}")'; }
      if (wSize <= 640) { image = 'url("{{asset('assets/images/bg-coridor.jpg')}}")'; }
      quote_text = "Perusahaan rokok Gudang Garam adalah salah satu industri rokok terkemuka di tanah air yang telah berdiri sejak tahun 1958 di kota Kediri, Jawa Timur.";
      image_title = "Gudang Garam Tower";

      switch (img) {

        case 'tentang kami':
          image = 'url("{{asset('assets/media/uploads/images/banner_tentangkami.jpg')}}")';
          if (wSize <= 768) { image = 'url("{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}")'; }
          if (wSize <= 640) { image = 'url("{{asset('assets/media/uploads/images/banner-tentang-kami-m.jpg')}}")'; }
          quote_text = "Perusahaan rokok Gudang Garam adalah salah satu industri rokok terkemuka di tanah air yang telah berdiri sejak tahun 1958 di kota Kediri, Jawa Timur.";
          image_title = "Gudang Garam Tower";
          break;


        case 'kontak':
          image = 'url("media/uploads/images/banner_kontak.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner_kontak.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner_kontak_m.jpg")'; }
          quote_text = "buka pikiran masuki dunia baru";
          image_title = "Kontak Terbaru";
          break;


        case 'media':
          image = 'url("media/uploads/images/banner_media.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner_media.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner_media.jpg")'; }
          quote_text = "apresiasi untuk sebuah kebanggaan";
          image_title = "Semangat Kebersamaan";
          break;


        case 'CSR':
          image = 'url("media/uploads/images/banner_csr.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner_csr_m.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner_csr_m.jpg")'; }
          quote_text = "hidup adalah memberi makna bagi sekitar";
          image_title = "Raih Bersama";
          break;


        case 'brand':
          image = 'url("media/uploads/images/banner_brand_dark-2.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner-brand-m.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner-brand-m.jpg")'; }
          quote_text = "karakter yang kuat cermin kesuksesan";
          image_title = "spanduk merek hitam";
          break;


        case 'karir':
          image = 'url("media/uploads/images/banner_karir.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner-karir-m.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner-karir-m.jpg")'; }
          quote_text = "manusia berkualitas tercipta dari kerja keras";
          image_title = "Santai dan Konsisten";
          break;


        case 'investor':
          image = 'url("media/uploads/images/banner_investor_dark.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner_investor.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner_investor_m.jpg")'; }
          quote_text = "kerja sama dalam membawa perubahan";
          image_title = "banner-inv_dark";
          break;


        case 'kretek':
          image = 'url("media/uploads/images/banner_kretek.jpg")';
          if (wSize <= 768) { image = 'url("media/uploads/images/banner-kretek-m.jpg")'; }
          if (wSize <= 640) { image = 'url("media/uploads/images/banner-kretek-m.jpg")'; }
          quote_text = "ketekunan dan ketelitian hasilkan karya besar";
          image_title = "Cengkeh Pilihan";
          break;


      }

      document.getElementById('home').style.backgroundImage = image;
    }
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('scripts')
</body>

</html>
