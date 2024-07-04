@include('partials.header')

@include('partials.blocks.head', ['home' => 'active'])


<body>


    <!--================== Hero Area Section Start ==================-->
    <section class="hero-area section" style="padding-top:0px;padding-bottom:0px">
        {{-- <div class="container"> --}}
        {{-- <div class="row text-center"> --}}
        {{-- <div class="col-lg-8 mx-auto"> --}}
        {{-- <div class="hero-img mx-auto position-relative mb-1" data-aos="zoom-in" data-aos-duration="700">
                        <img src="{{ asset('images/kemahasiswaan.webp') }}" alt="img"
                            style="width: 300px; height: 300px;">
                        <span class="shape shape-1"></span>
                        <span class="shape shape-2"></span>
                        <span class="shape shape-3"></span>
                        <span class="shape shape-4"></span>
                    </div> --}}
        {{-- <p class="mb-3 fw-medium fs-4 text-primary">Hello, myself Rick....</p> --}}
        {{-- <h2 class="mb-4" data-aos="fade-up" data-aos-duration="700">Direktorat Kemahasiswaan dan Alumni
                    </h2> --}}
        {{-- <p class="mb-1" data-aos="fade-down" data-aos-duration="1000">Direktorat Kemahasiswaan dan Alumni
                        merupakan unit kerja di lingkungan Universitas
                        Borneo Lestari berada di bawah pengelolaan <b style="color: #006bde">Wakil Rektor III</b> bidang
                        kemahasiswaan yang
                        melayani
                        berbagai layanan kemahasiswaan dan alumni. Dalam pelaksanaan tugasnya, Direktorat Kemahasiswaan
                        bertugas untuk memberikan pelayanan terhadap <b style="color: #006bde">mahasiswa aktif</b>
                        maupun <b style="color: #006bde">calon alumni</b>
                        untuk
                        mempersiapkan mereka sebagai lulusan yang <b style="color: #006bde">siap kerja</b>.</p> --}}
        {{-- <a href="#" class="btn btn-primary btn-lg">Know About Me</a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
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
    @include('pengantar')
    <!--================== Pengantar Section End ==================-->

    <!--================== Service Section Start ==================-->
    @include('layanan')
    <!--================== Service Section End ==================-->

    <!--================== Blog Section Start ==================-->
    @include('blog')
    <!--================== Blog Section End ==================-->

    <!--================== Experience Section Start ==================-->

    <!--================== Experience Section End ==================-->

    <!--================== Testimonial Section Start ==================-->

    <!--================== Testimonial Section End ==================-->

    <!--================== Project Section Start ==================-->
    @include('galeri')
    <!--================== Project Section End ==================-->
    @include('modals/modal_login')

</body>

@include('partials/blocks/foot')
@include('partials/footer')
