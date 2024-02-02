<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSR - @yield('title')</title>

    @include('backend.includes.style')
    @yield('after-main-style')

</head>

<body>
    @include('backend.includes.sidebar')
    <div class="main-content" id="panel">
        @include('backend.includes.navbar')

        <div class="header bg-gradient-danger pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">@yield('page-breadcumb')</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item">
                                        <a href="#"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">@yield('page-breadcumb')</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @yield('page-section')
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt--6">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    @include('backend.includes.script')
    @yield('after-main-script')
</body>

</html>
