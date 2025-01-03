@include('partials.header')

@include('partials.blocks.head', ['home' => 'active'])


<body>
    <!--================== Hero Area Section Start ==================-->
    <section class="hero-area section" style="padding-top:0px;padding-bottom:0px">
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
