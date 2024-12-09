@include('partials.header')

@include('partials.blocks.head')
{{-- @include('partials.blocks.head', ['home' => 'active']) --}}


<body>


    <!--================== Hero Area Section Start ==================-->
    <section style="background-color: #f9f9f9">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center m-2 mt-4">
                        <img src="{{ asset('images/kemahasiswaan.webp') }}" alt="img" style="width: 300px; height: 300px; margin-left: auto;" data-aos="zoom-in"
                            data-aos-duration="700">
                    </div>
                    {{-- <div class="me-4 text-right" data-aos="fade-right" data-aos-duration="1500">
                        <h2>Daftarkan Prestasimu Disini!</h2>
                    </div> --}}
                </div>
                <div class=" col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <p class="mb-0"><b style="color: #006bde">Direktorat Kemahasiswaan</b> dan <b style="color: #006bde">Alumni</b> merupakan unit kerja di lingkungan Universitas
                        Borneo Lestari berada di bawah pengelolaan <b style="color: #006bde">Wakil Rektor III</b> bidang
                        kemahasiswaan yang
                        melayani
                        berbagai layanan kemahasiswaan dan alumni. Dalam pelaksanaan tugasnya, Direktorat Kemahasiswaan
                        bertugas untuk memberikan pelayanan terhadap <b style="color: #006bde">mahasiswa aktif</b>
                        maupun <b style="color: #006bde">calon alumni</b>
                        untuk
                        mempersiapkan mereka sebagai lulusan yang <b style="color: #006bde">siap kerja</b>.</p>
                    <div class="me-4 text-left mt-4" data-aos="fade-right" data-aos-duration="1500">
                        <h2>Daftar Beasiswa Disini!</h2>
                    </div>
                    <a name="" id="" class="btn btn-lg btn-primary mt-2" href="#" role="button" data-toggle="modal" data-target="#jenisBeasiswaModal">Daftar
                        Beasiswa
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

    <section class="achivements section">
        <div class="container">
            <div class="row justify-content-between" data-aos="fade-up" data-aos-duration="3000">
                <div class="col-lg-5">
                    <div class="section-title mb-5">
                        <h2>Pengumuman <strong>
                                pengumuman.....
                                <svg width="198" height="21" viewBox="0 0 198 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 18.7327C13.8854 9.74093 29.4859 8.69377 43.6964 6.03115C65.1095 2.01897 86.6266 1.40829 108.405 2.01061C137.628 2.81881 166.558 7.3721 195.577 11.0296"
                                        stroke="#FF5733" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </strong> </h2>
                    </div>
                    <div class="mb-5 mb-lg-0">
                        <p>Lorem ipsum dolor sit amet, conse asdsd adipiscing
                            elit. Malesa est sagittis et nualla leo ut nulla aliuam. Nisi, fermetum suspend vene ntis enim vel bedspend
                        </p>
                    </div>

                </div>
                <div class="col-lg-7">
                    <div class="achivments-bg me-2">
                        <div class=" border-bottom pb-4 mb-4">
                            <span class="d-block mb-3 h4 text-secondery fw-normal">2017</span>
                            <h3 class="fs-4">Best Design award on Mobile Application for <strong class="text-primary">StartUp
                                    Week Mobile</strong> </h3>
                        </div>
                        <div class=" border-bottom pb-4 mb-4">
                            <span class="d-block  mb-3 h4 text-secondery fw-normal">2019</span>
                            <h3 class="fs-4">Special Award for Creative concept "SafeNet" during <strong class="text-primary">SoftUni
                                    Fest</strong> </h3>
                        </div>
                        <div class="border-bottom pb-4 mb-4">
                            <span class="d-block mb-3 h4 text-secondery fw-normal">2019</span>
                            <h3 class="fs-4">Behance featured project Match Frame Studio at <strong class="text-primary">Interaction
                                    design</strong> </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('modals/modal_beasiswa')


</body>

@include('partials/blocks/foot')
@include('partials/footer')
