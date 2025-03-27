<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>KEMAHASISWAAN UNBL</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('vendor/slick/css/slick.css') }}">

    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('vendor/aos/css/aos.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('vendor/landing/css/style.css') }}">

    {{-- Boxicons --}}
    <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.css') }}" />
    <!--Favicon-->
    <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->

    {{-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> --}}

</head>

<body>
    <header class="navigation border-bottom">
        <nav class="navbar navbar-expand-sm flex-sm-nowrap flex-wrap">
            <div class="container-fluid">
                <div class="d-none d-lg-block">
                    <a class="login" href="" style="color: black !important; text-decoration: none;">
                        <small class="p-2 pr-4 pl-4 me-3 rounded link-login">
                            Login
                        </small>
                    </a>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/site.png') }}" alt="Kemahasiswaaan UNBL" width="250" height="250" class="img-fluid">
                        <span class="text-white p-1 rounded" style="background-color: #09114d">.unbl</span>
                    </a>
                </div>
                <div class="d-lg-none d-flex align-items-center justify-content-between w-100">
                    <a class="login" href="" style="color: black !important; text-decoration: none;">
                        <span class="p-2 pr-4 pl-4 rounded link-login">
                            Login
                        </span>
                    </a>
                    <a class="navbar-brand text-white p-1 rounded" href="{{ url('/') }}" style="display: inline-block;">
                        <img src="{{ asset('img/site.png') }}" alt="Kemahasiswaaan UNBL" class="img-fluid">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class='bx bx-menu'></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="https://tracer.unbl.ac.id/" style="color: black !important; text-decoration: none;">
                                <span class="p-2 pr-4 pl-4 rounded link-tracer">
                                    TRACER
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Beasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prestasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- {{ Route::currentRouteName() }} --}}
    @yield(Route::currentRouteName() ? Str::replace('.', '-', Route::currentRouteName()) : 'content')


    <div class="backtotop">
        <i class='bx bxs-upvote'></i>
    </div>
    <footer style="margin-left:0%">
        <div class="footer-top section m-0 p-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center">
                        <p class="mb-0">
                            <a href="" class="login">
                                <span style="color: #1b36f7">Developed</span>
                            </a> by
                            <a rel="nofollow" href="https://izzoel.github.io/ " target="blank">
                                <span style="color: #1b36f7">zetware.id</span>
                            </a>
                            @2025
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/js/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slick-slider-->
    <script src="{{ asset('vendor/slick/js/slick.js') }}"></script>
    <!-- aos -->
    <script src="{{ asset('vendor/aos/js/aos.js') }}"></script>
    <!-- shuffle -->
    <script src="{{ asset('vendor/shuffle/js/shuffle.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('vendor/landing/js/script.js') }}"></script>
    <!-- SweetAlert2 JS -->
    <script src="{{ asset('vendor/sweetalert2/js/sweetalert2.js') }}"></script>
    <!-- Login Script -->
    <script src="{{ asset('scripts/sw-login.js') }}"></script>

    <script>
        $(document).on('click', '#pagination-links a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: "/?page=" + page,
                type: "GET",
                success: function(data) {
                    $("#postingan-container").html($(data).find("#postingan-container").html());
                }
            });
        });
    </script>
</body>

</html>
