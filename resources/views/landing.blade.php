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
                    <p class="mb-5">Lorem ipsum dolor sit amet, consecttur adipiscing Orci
                        fauff cibus urna, sed senectus iaculis leo condimentum. Maenas nec adipiscing neque,
                        pellentesque
                        in. Metus
                        fusce.</p>
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
    @include('modals/login')
</body>

@include('partials/blocks/foot')
@include('partials/footer')
