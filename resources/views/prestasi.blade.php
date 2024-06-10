@include('partials.header')

@include('partials.blocks.head', ['home' => 'active'])


<body>


    <!--================== Hero Area Section Start ==================-->
    <section class="hero-area section ">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center m-2 mt-4">
                        <img src="{{ asset('images/kemahasiswaan.webp') }}" alt="img"
                            style="width: 300px; height: 300px; margin-left: auto;" data-aos="zoom-in"
                            data-aos-duration="700">
                    </div>
                    {{-- <div class="me-4 text-right" data-aos="fade-right" data-aos-duration="1500">
                        <h2>Daftarkan Prestasimu Disini!</h2>
                    </div> --}}
                </div>
                <div class=" col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <p class="mb-0"><b style="color: #006bde">Direktorat Kemahasiswaan</b> dan <b
                            style="color: #006bde">Alumni</b> merupakan unit kerja di lingkungan Universitas
                        Borneo Lestari berada di bawah pengelolaan <b style="color: #006bde">Wakil Rektor III</b> bidang
                        kemahasiswaan yang
                        melayani
                        berbagai layanan kemahasiswaan dan alumni. Dalam pelaksanaan tugasnya, Direktorat Kemahasiswaan
                        bertugas untuk memberikan pelayanan terhadap <b style="color: #006bde">mahasiswa aktif</b>
                        maupun <b style="color: #006bde">calon alumni</b>
                        untuk
                        mempersiapkan mereka sebagai lulusan yang <b style="color: #006bde">siap kerja</b>.</p>
                    <div class="me-4 text-left mt-4" data-aos="fade-right" data-aos-duration="1500">
                        <h2>Daftarkan Prestasimu Disini!</h2>
                    </div>
                    <a name="" id="" class="btn btn-lg btn-primary mt-2" href="#" role="button"
                        data-toggle="modal" data-target="#tambahPrestasi">Daftar Prestasi
                    </a>
                </div>
            </div>
        </div>
        <div class="has-circle">
            <span class="circle circle-1"></span>
            <span class="circle circle-2"></span>
            <span class="circle circle-3"></span>
            <span class="circle circle-4"></span>
            <span class="circle circle-5"></span>
            <span class="circle circle-6"></span>
            <span class="circle circle-7"></span>
        </div>
    </section>
    <!--================== Hero Area Section End ==================-->

    <!--================== Brand Logo Section start ==================-->

    <!--================== Brand Logo Section End ==================-->

    <!--================== Pengantar Section Start ==================-->
    {{-- @include('pengantar') --}}
    <!--================== Pengantar Section End ==================-->

    <!--================== Service Section Start ==================-->
    {{-- @include('layanan') --}}
    <!--================== Service Section End ==================-->

    <!--================== Blog Section Start ==================-->
    {{-- @include('blog') --}}
    <!--================== Blog Section End ==================-->

    <!--================== Experience Section Start ==================-->

    <!--================== Experience Section End ==================-->

    <!--================== Testimonial Section Start ==================-->

    <!--================== Testimonial Section End ==================-->

    <!--================== Project Section Start ==================-->
    @include('galeri')
    <!--================== Project Section End ==================-->
    @include('modals/modal_login')
    @include('modals/modal_prestasi')


</body>

@include('partials/blocks/foot')
@include('partials/footer')
