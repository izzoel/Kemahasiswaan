@include('partials.header')

@include('partials.blocks.head', ['home' => 'active'])


<body>


    <!--================== Hero Area Section Start ==================-->
    <section class="hero-area section ">

        <div class="has-circle">
            <span class="circle circle-1"></span>
            <span class="circle circle-2"></span>
            <span class="circle circle-3"></span>
            <span class="circle circle-4"></span>
            <span class="circle circle-5"></span>
            <span class="circle circle-6"></span>
            <span class="circle circle-7"></span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="_df_thumb" thumb="{{ asset('pdf/pedoman/PEDOMAN -- Layanan Kemahasiswaan UNBL 2024.png') }}"
                        source="{{ asset('pdf/pedoman/PEDOMAN -- Layanan Kemahasiswaan UNBL 2024.pdf') }}" style="height: 400px; width: 300px">
                        PEDOMAN -- Layanan Kemahasiswaan UNBL 2024
                    </div>
                    <div class="text-center row">
                        <div class="col">
                            <div class="badge badge-primary">PEDOMAN</div>
                            <div class="text-center" style="width: 300px; margin: 0 auto;">
                                <p style="font-weight: bold; font-size: 20px;">
                                    Layanan Kemahasiswaan UNBL 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="_df_thumb" thumb="{{ asset('pdf/pedoman/PEDOMAN -- Penetapan Angka Kredit Kegiatan Kemahasiswaan UNBL 2024.png') }}"
                        source="{{ asset('pdf/pedoman/PEDOMAN -- Penetapan Angka Kredit Kegiatan Kemahasiswaan UNBL 2024.pdf') }}" style="height: 400px; width: 300px">
                        PEDOMAN -- Penetapan Angka Kredit Kegiatan Kemahasiswaan UNBL 2024
                    </div>
                    <div class="text-center row">
                        <div class="col">
                            <div class="badge badge-primary">PEDOMAN</div>
                            <div class="text-center" style="width: 300px; margin: 0 auto;">
                                <p style="font-weight: bold; font-size: 20px;">
                                    Penetapan Angka Kredit Kegiatan Kemahasiswaan UNBL 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="_df_thumb" thumb="{{ asset('pdf/pedoman/PEDOMAN -- UKM UNBL 2024.png') }}" source="{{ asset('pdf/pedoman/PEDOMAN -- UKM UNBL 2024.pdf') }}"
                        style="height: 400px; width: 300px">
                        PEDOMAN -- UKM UNBL 2024
                    </div>
                    <div class="text-center row">
                        <div class="col">
                            <div class="badge badge-primary">PEDOMAN</div>
                            <div class="text-center" style="width: 300px; margin: 0 auto;">
                                <p style="font-weight: bold; font-size: 20px;">
                                    UKM UNBL 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="_df_thumb" thumb="{{ asset('pdf/pedoman/PEDOMAN -- PMB UNBL 2024.jpg') }}" source="{{ asset('pdf/pedoman/PEDOMAN -- PMB UNBL 2024.pdf') }}"
                        style="height: 400px; width: 300px">
                        PEDOMAN -- PMB UNBL 2024
                    </div>
                    <div class="text-center row">
                        <div class="col">
                            <div class="badge badge-primary">PEDOMAN</div>
                            <div class="text-center" style="width: 300px; margin: 0 auto;">
                                <p style="font-weight: bold; font-size: 20px;">
                                    PMB UNBL 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!--================== Project Section End ==================-->
    @include('modals/modal_login')


</body>

@include('partials/blocks/foot')
@include('partials/footer')
