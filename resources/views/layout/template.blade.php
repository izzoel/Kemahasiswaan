<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $data['title'] ?? 'Default Title' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/sneat/css/demo.css') }}" />

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/sneat/libs/apex-charts/apex-charts.css') }}" />

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css">


    <style>
        .td-line {
            border-bottom: 1px solid black;
            height: 10px;
        }


        .flatpickr-innerContainer {
            display: none !important;
        }

        .swal2-container {
            z-index: 9999 !important;
            /* Pastikan Swal di atas semua elemen */
        }

        .swal2-popup {
            z-index: 90000 !important;
            /* Popup Swal lebih tinggi dari backdrop */
        }

        .responsive-iframe {
            width: 100%;
            min-height: 35rem;
            border: none;
        }

        @media (max-width: 768px) {
            .responsive-iframe {
                width: 100%;
                min-height: 11rem;
                border: none;
            }
        }
    </style>

    <!-- Helpers -->
    <script src="{{ asset('vendor/sneat/js/helpers.js') }}"></script>
    <script src="{{ asset('vendor/sneat/js/config.js') }}"></script>

</head>

<body>

    @if (session('success'))
        @include('auth.toasts.success')
    @elseif (session('fail'))
        @include('auth.toasts.fail')
    @endif

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layout.sidebar')
            <div class="layout-page">
                @include('layout.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    {{-- {{ Route::currentRouteName() }} --}}
                    @yield(Route::currentRouteName() ? Str::replace('.', '-', Route::currentRouteName()) : 'content')
                </div>
                <!-- / Content -->

                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">developed by <a href="https://izzoel.github.io/" class="footer-link fw-bolder">zetware.id</a> @2025</div>
                    </div>
                </footer>

                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('vendor/sneat/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/sneat/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/sneat/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/sneat/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/sneat/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/sneat/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('vendor/sneat/js/main.js') }}"></script>

    <!-- Popover JS -->
    <script src="{{ asset('vendor/sneat/js/ui-popover.js') }}"></script>

    <!-- Toast JS -->
    <script src="{{ asset('vendor/sneat/js/ui-toasts.js') }}"></script>

    <!-- SweetAlert2 JS -->
    <script src="{{ asset('vendor/sweetalert2/js/sweetalert2.js') }}"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    {{-- @include('auth.scripts.datatables') --}}
    @if (count(request()->segments()) > 1)
        @include('auth.scripts.' . request()->segment(2))
    @endif

    @include('auth.scripts.toasts')

</body>

</html>
