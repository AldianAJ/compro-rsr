<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSR - Admin </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <link rel="stylesheet" href="{{ asset('argon/assets/vendor/nucleo/css/nucleo.cs') }}s" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">

    <link rel="stylesheet" href="{{ asset('argon/assets/css/argon.min23cd.css?v=1.2.1') }}" type="text/css">

</head>

<body>
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="../dashboards/dashboard.html">
                <img src="{{ asset("assets/images/logo-rajawali.png") }}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="main-content">
        <div class="header bg-gradient-warning py-7 py-lg-8 pt-lg-2">
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-gradient-secondary border-0 mb-0">
                        <div class="card-header bg-transparent">
                            <div class="text-muted text-center mt-2">
                                Sign in
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" name="email"
                                            id="email" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password"
                                            name="password" id="password" required />
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning my-4">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('argon/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.j') }}s"></script>

    <script src="{{ asset('argon/assets/js/argon.min23cd.js?v=1.2.1') }}"></script>

    <script src="{{ asset('argon/assets/js/demo.min.js') }}"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"82683f0f3d1b6046","b":1,"version":"2023.10.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "{{ route('backend.auth.login') }}",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(resp) {
                    if (resp.code == 200) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: resp.message,
                            timer: 3000
                        });
                        window.location.href = "{{ route('backend.about.content.index') }}";
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Warning",
                            text: resp.message,
                            timer: 3000
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
