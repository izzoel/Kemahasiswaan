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
    <section class="projects section pt-0">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-lg-6 col-12 mx-auto ">
                    <div class="section-title mb-md-4">
                        <h2>My <strong>
                                Selected
                                <svg class="" width="198" height="21" viewBox="0 0 198 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 18.7327C13.8854 9.74093 29.4859 8.69377 43.6964 6.03115C65.1095 2.01897 86.6266 1.40829 108.405 2.01061C137.628 2.81881 166.558 7.3721 195.577 11.0296"
                                        stroke="#FF5733" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </strong> projects

                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 g-md-5 ">
                <div class="col-md-6 image-item">
                    <div class="card rounded-0 border-0" data-aos="fade-up" data-aos-duration="1500">
                        <img class="img-fluid" src="images/project-img.png" alt="img">
                        <div class="card-img-overlay">
                            <div class="card-body">
                                <a href="portfolio-single.html" class="h4 text-white"> Drinking from the sea of
                                    knowledge</a>
                                <ul class="meta-list list-unstyled d-flex">
                                    <li class="list-inline-item text-white fw-normal">Digital</li>
                                    <li class="list-inline-item text-white fw-normal">Exhibition</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 image-item">
                    <div class="card rounded-0 border-0" data-aos="fade-up" data-aos-duration="1500">
                        <img class="img-fluid" src="images/project-img-one.png" alt="img">
                        <div class="card-img-overlay">
                            <div class="card-body">
                                <a href="portfolio-single.html" class="h4 text-white ">A Feast Of A Time-Honored
                                    History</a>
                                <ul class="meta-list list-unstyled d-flex">
                                    <li class="list-inline-item text-white fw-normal">Digital</li>
                                    <li class="list-inline-item text-white fw-normal">Branding</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 image-item">
                    <div class="card rounded-0 border-0" data-aos="fade-up" data-aos-duration="2000">
                        <img class="img-fluid" src="images/project-img-two.png" alt="img">
                        <div class="card-img-overlay">
                            <div class="card-body">
                                <a href="portfolio-single.html" class="h4 text-white ">Google Play ACG Interactive
                                    Game</a>
                                <ul class="meta-list list-unstyled d-flex">
                                    <li class="list-inline-item text-white fw-normal">Digital</li>
                                    <li class="list-inline-item text-white fw-normal">Events</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 image-item">
                    <div class="card rounded-0 border-0" data-aos="fade-up" data-aos-duration="2000">
                        <img class="img-fluid" src="images/project-img-three.png" alt="img">
                        <div class="card-img-overlay">
                            <div class="card-body">
                                <a href="portfolio-single.html" class="h4 text-white ">Monopoly Dreams Hong Kong</a>
                                <ul class="meta-list list-unstyled d-flex">
                                    <li class="list-inline-item text-white fw-normal">Digital</li>
                                    <li class="list-inline-item text-white fw-normal">Marketing</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 mx-auto text-center">
                    <a href="portfolio.html" class="btn btn-outline-primary text-capitailize fw-medium py-2">view
                        all</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================== Project Section End ==================-->
    @include('modals/login')
</body>

@include('partials/blocks/foot')
@include('partials/footer')
