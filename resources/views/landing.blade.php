@include('partials.header')

@include('partials.blocks.head', ['home' => 'active'])


<body>


    <!--================== Hero Area Section Start ==================-->
    <section class="hero-area section">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 mx-auto">
                    <div class="hero-img mx-auto mb-3 position-relative">
                        <img src="images/banner-img.png" alt="img">
                        <span class="shape shape-1"></span>
                        <span class="shape shape-2"></span>
                        <span class="shape shape-3"></span>
                        <span class="shape shape-4"></span>
                    </div>
                    <p class="mb-3 fw-medium fs-4 text-primary">Hello, myself Rick....</p>
                    <h1 class="mb-4">Creating fast website and softwares </h1>
                    <p class="mb-5">Direktorat Kemahasiswaan dan Alumni merupakan unit kerja di lingkungan Universitas
                        Borneo Lestari berada di bawah pengelolaan Wakil Rektor III bidang kemahasiswaan yang mengurusi
                        berbagai layanan kemahasiswaan dan alumni. Dalam pelaksanaan tugasnya, Direktorat Kemahasiswaan
                        bertugas untuk memberikan pelayanan terhadap mahasiswa aktif maupun calon alumni untuk
                        mempersiapkan mereka sebagai lulusan yang siap kerja.</p>
                    <a href="#" class="btn btn-primary btn-lg">Know About Me</a>
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
