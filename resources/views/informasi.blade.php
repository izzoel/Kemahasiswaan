@include('partials.header')

@include('partials.blocks.head', ['home' => 'active'])


<body>


    <!--================== Hero Area Section Start ==================-->
    <section class="hero-area section ">
        <div class="container">
            {{-- <div class="_df_thumb" id="df_manual_thumb"
                source="{{ asset('PEDOMAN-ANGKA-KREDIT-KEGIATAN-KEMAHASISWAAN-STIKES-BL.pdf') }}">
                PEDOMAN-ANGKA-KREDIT-KEGIATAN-KEMAHASISWAAN-STIKES-BL</div> --}}
            {{-- <div class="_df_button" source="{{ asset('PEDOMAN-ANGKA-KREDIT-KEGIATAN-KEMAHASISWAAN-STIKES-BL.pdf') }}"
                id="df_manual_button">
                Button
            </div> --}}

            {{-- <div class="_df_book" id="flipbok_example"
                source="{{ asset('PEDOMAN-ANGKA-KREDIT-KEGIATAN-KEMAHASISWAAN-STIKES-BL.pdf') }}"></div> --}}

            {{-- <div class="_df_thumb" id="flipbok_example" source="{{ asset('a.pdf') }}">a</div> --}}

            <div class="_df_thumb" id="flipbok_example" thumb="a.jpg" source="a.pdf" style="height: 400px; width: 300px">
            </div>
            <div class="_df_thumb" thumb="a.jpg" source="pdf.pdf" style="height: 400px; width: 300px">
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
    <!--================== Project Section End ==================-->
    @include('modals/modal_login')


</body>

@include('partials/blocks/foot')
@include('partials/footer')
