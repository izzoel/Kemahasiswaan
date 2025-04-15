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

    <!-- Apex-Charts CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/sneat/libs/apex-charts/apex-charts.css') }}" />

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.css" rel="stylesheet">

    <!-- Air Datepicker CSS -->
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
                {{-- {{ Route::currentRouteName() }} --}}
                <div class="content-wrapper">
                    {{-- {{ dd(request()->segments()) }} --}}
                    @yield(Route::currentRouteName())
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

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <!-- AirDatepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    <script>
        $('#picture').change(function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#uploadedAvatar').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $('.account-image-reset').click(function() {
            let defaultLogo = $('#uploadedAvatar').data('default');
            $('#uploadedAvatar').attr('src', defaultLogo);
            $('#picture').val('');
        });

        function showToast(type, message) {
            let bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
            let toastHtml = `
            <div class="bs-toast toast toast-placement-ex m-2 ${bgClass} top-0 start-0 fade show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="toast-header">
                    <i class='bx ${type === 'success' ? 'bx-check-circle' : 'bx-x-circle'} bx-burst me-2'></i>
                    <div class="me-auto fw-semibold">${type === 'success' ? 'Sukses!' : 'Gagal!'}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">${message}</div>
            </div>`;

            $("body").append(toastHtml);
            setTimeout(() => {
                $(".bs-toast").remove();
            }, 3500);
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

        const dropdown = document.getElementById('notifDropdown');

        dropdown.addEventListener('mouseenter', () => {
            const menu = dropdown.querySelector('.dropdown-menu');
            dropdown.classList.add('show');
            menu.classList.add('show');
        });

        dropdown.addEventListener('mouseleave', () => {
            const menu = dropdown.querySelector('.dropdown-menu');
            dropdown.classList.remove('show');
            menu.classList.remove('show');
        });
    </script>

    <script>
        setInterval(() => {
            fetch('{{ url('/notif/realtime') }}')
                .then(res => res.json())
                .then(data => {
                    const badge = document.querySelector('.bx-bell + .badge');
                    if (badge) {
                        badge.textContent = data.jumlah > 0 ? data.jumlah : '';
                        badge.classList.toggle('d-none', data.jumlah === 0);
                    }
                });
        }, 2000); // refresh tiap 15 detik
    </script>

    <script>
        let idleTime = 0;
        const logoutAfter = 120; // menit

        const idleInterval = setInterval(() => {
            idleTime++;
            if (idleTime >= logoutAfter) {
                window.location.href = "{{ route('logout') }}";
            }
        }, 60000); // 1 menit = 60000ms

        document.onmousemove = document.onkeypress = () => {
            idleTime = 0;
        };
    </script>

    {{-- @include('auth.scripts.datatables') --}}
    @if (count(request()->segments()) > 1)
        @if (request()->segment(2) == 'dashboard' || request()->segment(2) == 'profile')
            @include('auth.scripts.' . request()->segment(2))
        @else
            @include('auth.scripts.' . request()->segment(2) . '.' . request()->segment(3))
        @endif
    @endif

    @include('auth.scripts.toasts')

</body>

</html>
