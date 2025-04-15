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

    <!-- Flipbook StyleSheet -->
    <link rel="stylesheet" href="{{ asset('vendor/dflip/css/dflip.css') }}">

    <!-- Air Datepicker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
    <!--Favicon-->
    <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->

    {{-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> --}}
    <style>
        /* Untuk text option di dropdown */
        .select2-container--bootstrap-5 .select2-results__option {
            text-align: left;
        }

        /* Untuk selected item (teks yang terlihat setelah dipilih) */
        .select2-container--bootstrap-5 .select2-selection__rendered {
            text-align: left;
        }
    </style>

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
                            <a class="nav-link" href="{{ url('/') }}#pedoman">Pedoman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnBeasiswa" href="{{ url('/') }}#layanan">Beasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnPrestasi" href="{{ url('/') }}#layanan">Prestasi</a>
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
                            developed by
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

    @include('guest.home.modal_konseling')
    @include('guest.home.modal_beasiswa')
    @include('guest.home.modal_prestasi')

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
    <!-- Flipbook main Js file -->
    <script src="{{ asset('vendor/dflip/js/dflip.min.js') }}"></script>
    <!-- Login Script -->
    <script src="{{ asset('scripts/sw-login.js') }}"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- AirDatepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true // Jalankan hanya sekali per elemen
            });

            // Setelah beberapa waktu (misalnya setelah animasi selesai), hapus atribut data-aos
            setTimeout(() => {
                document.querySelectorAll('[data-aos]').forEach(el => {
                    el.removeAttribute('data-aos');
                    el.removeAttribute('data-aos-duration');
                });
            }, 1200); // waktu ini harus lebih lama dari durasi AOS (1000ms)
        });

        jQuery(function() {
            DFLIP.defaults.backgroundColor = "gray";

            $(".dflip").each(function() {
                new DFLIP(this);
            });
        });
    </script>


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

        $(document).ready(function() {
            $('.btnKonseling').click(function() {
                $('#M_S_konseling').modal('show');
            });
            $('.btnBeasiswa').click(function() {
                $('#M_S_beasiswa').modal('show');
            });
            $('.btnPrestasi').click(function() {
                $('#M_S_prestasi').modal('show');
            });

            $('input[name="hp"]').on('input', function() {
                let val = $(this).val().replace(/\D/g, ''); // Hanya angka

                // Format: 08XX-XXXX-XXXX
                if (val.length > 4 && val.length <= 8) {
                    val = val.replace(/^(\d{4})(\d+)/, '$1-$2');
                } else if (val.length > 8) {
                    val = val.replace(/^(\d{4})(\d{4})(\d+)/, '$1-$2-$3');
                }

                $(this).val(val);
            });

            $('input[name="hp"]').on('paste', function(e) {
                e.preventDefault();
            });

            let isBackspacing = false;

            $('#B_A_ips')
                .on('keydown', function(e) {
                    // Deteksi jika backspace ditekan
                    isBackspacing = (e.key === "Backspace");
                })
                .on('input', function() {
                    let val = $(this).val();

                    // Hapus semua karakter selain angka
                    val = val.replace(/[^0-9]/g, '');

                    // Batasi maksimal 3 digit
                    val = val.substring(0, 3);

                    // Kalau sedang menekan backspace, biarkan pengguna menghapus secara alami
                    if (isBackspacing) {
                        isBackspacing = false;
                        $(this).val(val);
                        return;
                    }

                    // Tambahkan koma otomatis setelah angka pertama
                    if (val.length >= 2) {
                        val = val.slice(0, 1) + ',' + val.slice(1);
                    } else if (val.length === 1) {
                        val = val + ',';
                    }

                    $(this).val(val);
                });


            $('#B_A_ips').on('paste', function(e) {
                e.preventDefault();
            });

            $('#B_NA_nama').on('change', function() {
                $('#B_NA_prestasi').val(null).trigger('change'); // reset
            });


            $("#M_S_konseling form").on("submit", function(e) {
                e.preventDefault();

                let btn = $(this).find("button[type='submit']");
                let originalText = btn.html();

                // Bersihkan input HP dari strip sebelum dikirim
                $('input[name="hp"]').each(function() {
                    let raw = $(this).val().replace(/\D/g, '');
                    $(this).val(raw);
                });

                let formData = new FormData(this); // Data bersih sekarang
                btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            $("#M_S_konseling").modal("hide").find("form")[0].reset();
                        }
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                        // bisa tambahkan alert/message di sini kalau perlu
                    },
                    complete: function() {
                        btn.html(originalText).prop("disabled", false);
                    }
                });
            });

            $("#BeasiswaAkademik").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let btn = form.find("button[type='submit']");
                let originalText = btn.html();
                let formData = new FormData(this);

                btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

                $.ajax({
                    url: form.attr("action"),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });

                            form[0].reset();
                            form.find("select").val(null).trigger('change');

                            $("#M_S_beasiswa").modal("hide"); // pastikan ID ini benar sesuai modal
                        }
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: message
                        });
                    },
                    complete: function() {
                        btn.html(originalText).prop("disabled", false);
                    }
                });
            });

            $("#BeasiswaNonakademik").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let btn = form.find("button[type='submit']");
                let originalText = btn.html();
                let formData = new FormData(this);

                btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

                $.ajax({
                    url: form.attr("action"),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });

                            form[0].reset();
                            form.find("select").val(null).trigger('change');

                            $("#M_S_beasiswa").modal("hide"); // pastikan ID ini benar sesuai modal
                        }
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: message
                        });
                    },
                    complete: function() {
                        btn.html(originalText).prop("disabled", false);
                    }
                });
            });

            $("#M_S_prestasi form").on("submit", function(e) {
                e.preventDefault();

                let btn = $(this).find("button[type='submit']");
                let originalText = btn.html();
                let formData = new FormData(this); // Ambil data form, termasuk file

                btn.html("<i class='bx bx-loader-circle bx-spin'></i>").prop("disabled", true);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    data: formData,
                    contentType: false, // Wajib agar bisa upload file
                    processData: false, // Wajib agar FormData dikirim apa adanya
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                            $("#M_S_prestasi").modal("hide").find("form")[0].reset();
                        }
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message || "Terjadi kesalahan!";
                    },
                    complete: function() {
                        btn.html(originalText).prop("disabled", false);
                    }
                });
            });
        });

        $('#K_nama').select2({
            theme: 'bootstrap-5',
            placeholder: "Ketik untuk mencari",
            allowClear: true,
            dropdownParent: $('#M_S_konseling'),
            ajax: {
                url: "{{ url('/konseling/mahasiswa/select') }}",
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    const uniqueData = [];
                    const seen = new Set();

                    data.forEach(item => {
                        if (!seen.has(item.nim)) {
                            seen.add(item.nim);
                            uniqueData.push(item);
                        }
                    });

                    return {
                        results: uniqueData.map(mahasiswa => ({
                            id: mahasiswa.nim,
                            text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                        }))
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            language: {
                inputTooShort: function() {
                    return "...";
                },
                noResults: function() {
                    return "Tidak ada hasil yang ditemukan";
                },
                searching: function() {
                    return "Sedang mencari...";
                }
            }
        }).val(null).trigger('change');
        $('#P_nama').select2({
            theme: 'bootstrap-5',
            placeholder: "Ketik untuk mencari",
            allowClear: true,
            dropdownParent: $('#M_S_prestasi'),
            ajax: {
                url: "{{ url('/prestasi/mahasiswa/select') }}",
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    const uniqueData = [];
                    const seen = new Set();

                    data.forEach(item => {
                        if (!seen.has(item.nim)) {
                            seen.add(item.nim);
                            uniqueData.push(item);
                        }
                    });

                    return {
                        results: uniqueData.map(mahasiswa => ({
                            id: mahasiswa.nim,
                            text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                        }))
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            language: {
                inputTooShort: function() {
                    return "...";
                },
                noResults: function() {
                    return "Tidak ada hasil yang ditemukan";
                },
                searching: function() {
                    return "Sedang mencari...";
                }
            }
        }).val(null).trigger('change');
        $('#B_A_nama').select2({
            theme: 'bootstrap-5',
            placeholder: "Ketik untuk mencari",
            allowClear: true,
            dropdownParent: $('#M_S_beasiswa'),
            ajax: {
                url: "{{ url('/beasiswa/akademik/select') }}",
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    const uniqueData = [];
                    const seen = new Set();

                    data.forEach(item => {
                        if (!seen.has(item.nim)) {
                            seen.add(item.nim);
                            uniqueData.push(item);
                        }
                    });

                    return {
                        results: uniqueData.map(mahasiswa => ({
                            id: mahasiswa.nim,
                            text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                        }))
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            language: {
                inputTooShort: function() {
                    return "...";
                },
                noResults: function() {
                    return "Tidak ada hasil yang ditemukan";
                },
                searching: function() {
                    return "Sedang mencari...";
                }
            }
        }).val(null).trigger('change');
        $('#B_NA_nama').select2({
            theme: 'bootstrap-5',
            placeholder: "Ketik untuk mencari",
            allowClear: true,
            dropdownParent: $('#M_S_beasiswa'),
            ajax: {
                url: "{{ url('/beasiswa/nonakademik/select') }}",
                type: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    const uniqueData = [];
                    const seen = new Set();

                    data.forEach(item => {
                        if (!seen.has(item.nim)) {
                            seen.add(item.nim);
                            uniqueData.push(item);
                        }
                    });

                    return {
                        results: uniqueData.map(mahasiswa => ({
                            id: mahasiswa.nim,
                            text: mahasiswa.nama + ' (' + mahasiswa.nim + ')'
                        }))
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            language: {
                inputTooShort: function() {
                    return "...";
                },
                noResults: function() {
                    return "Tidak ada hasil yang ditemukan";
                },
                searching: function() {
                    return "Sedang mencari...";
                }
            }
        }).val(null).trigger('change');
        $('#B_NA_prestasi').select2({
            theme: 'bootstrap-5',
            placeholder: "Isi nama terlebih dahulu",
            allowClear: true,
            dropdownParent: $('#M_S_beasiswa'),
            ajax: {
                url: function(params) {
                    let nim = $('#B_NA_nama').val();
                    if (!nim) return ''; // menghindari URL kosong
                    return "{{ url('/prestasi/mahasiswa/prestasi') }}/" + nim;
                },
                type: 'GET',
                dataType: 'json',
                delay: 250,
                cache: true,
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id, // sesuaikan dengan field yang dibutuhkan
                                text: item.prestasi + ' -- tingkat ' + item.tingkat + ' (' + item.raihan + ')' // ganti dengan nama field untuk ditampilkan
                            };
                        })
                    };
                }
            },
            minimumInputLength: 0,
            language: {
                inputTooShort: function() {
                    return "...";
                },
                noResults: function() {
                    return "Tidak ada hasil yang ditemukan";
                },
                searching: function() {
                    return "Sedang mencari...";
                }
            }
        }).val(null).trigger('change');


        document.addEventListener("DOMContentLoaded", function() {
            new AirDatepicker('#K_tanggal', {
                timepicker: true,
                range: true,
                autoClose: true,
                multipleDatesSeparator: " - ",
                dateTimeSeparator: ' ', // Spasi antara tanggal dan waktu
                dateFormat: 'dd MMMM yyyy', // Tanggal saja
                timeFormat: 'HH:mm', // Format jam
                locale: {
                    days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                    daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                    daysMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                    months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    today: 'Hari Ini',
                    clear: 'Hapus',
                    firstDay: 1
                },
                container: '#M_S_konseling',
            });

            new AirDatepicker('#P_tahun', {
                view: 'years',
                minView: 'years',
                dateFormat: 'yyyy',
                autoClose: true,
                container: '#M_S_prestasi',
            });
        });
    </script>

</body>

</html>
