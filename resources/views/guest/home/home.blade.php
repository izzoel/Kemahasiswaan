<section class="hero-area" style="background-color: #f9f9f9">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="mt-4 text-center" data-aos="fade-right" data-aos-duration="1500">
                <h2>Direktorat Kemahasiswaan Dan Alumni</h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center m-2 mt-4">
                    <img src="{{ asset('img/kemahasiswaan.webp') }}" alt="landing kemahasiswaan" style="width: 300px; height: 300px; margin-left: auto;" data-aos="zoom-in"
                        data-aos-duration="700">
                </div>
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
            </div>
        </div>
    </div>
</section>

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

<section class="services section">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-lg-6 col-12 mx-auto ">
                <div class="section-title mb-md-4" id="layanan">
                    <h2>Layanan
                        <strong>
                            Kami
                            <svg width="198" height="21" viewBox="0 0 198 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 18.7327C13.8854 9.74093 29.4859 8.69377 43.6964 6.03115C65.1095 2.01897 86.6266 1.40829 108.405 2.01061C137.628 2.81881 166.558 7.3721 195.577 11.0296"
                                    stroke="#1b36f7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </strong>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 card-item" id="M_konseling">
                <div class="card text-center border-0 bg-white radius shadow px-3 py-5" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card-icon mb-3">
                        <i class='bx bx-conversation'></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Konseling</h4>
                        <p class="card-text small">Layanan konseling ini ditangani oleh konselor atau psikolog profesional yang ahli di bidangnya dan mencakup penanganan pada
                            keluhan atau konsultasi atas permintaan sendiri dan penanganan karena adanya rujukan.
                        </p>
                        <button class="text-capitalize btn btn-outline-primary px-4 py-0 rounded-1 btnKonseling">
                            Lihat<span> &rarr;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 card-item" id="M_beasiswa">
                <div class="card text-center border-0 bg-white radius shadow px-3 py-5">
                    <div class="card-icon mb-3">
                        <i class='bx bxs-graduation' style="color: #e86e16"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Beasiswa</h4>
                        <p class="card-text small">Program beasiswa memberikan kesempatan besar kepada mahasiswa UNBL untuk meraih impian akademik mereka tanpa khawatir tentang
                            kendala finansial. Mencakup biaya pendidikan dan atau biaya hidup.
                        </p>
                        <button class="text-capitalize btn btn-outline-primary px-4 py-0 rounded-1 btnBeasiswa">
                            Lihat<span> &rarr;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 card-item" id="M_prestasi">
                <div class="card text-center border-0 bg-white radius shadow px-3 py-5" data-aos="fade-left" data-aos-duration="1500">
                    <div class="card-icon mb-3">
                        <i class='bx bx-trophy' style="color: #acde0a"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Prestasi</h4>
                        <p class="card-text small">Penghargaan kepada mahasiswa UNBL yang menunjukkan kinerja luar biasa dalam bidang akademik,
                            olahraga, seni, dan kegiatan lainnya. Bertujuan untuk menginspirasi dan memotivasi dalam mencapai potensi tertinggi mereka.
                        </p>
                        <button class="text-capitalize btn btn-outline-primary px-4 py-0 rounded-1 btnPrestasi">
                            Lihat<span> &rarr;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($artikels)
    <section class="blog section mt-2" id="post">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="h4 mb-3">Postingan Kemahasiswaan</h3>
                    <div id="postingan-container">
                        @foreach ($artikels as $artikel)
                            <div class="card mb-5 border-0 font-primary">
                                <div class="row g-0">
                                    @if (!empty($artikel->thumbnail))
                                        <div class="col-md-5">
                                            <img src="{{ asset('thumbnails/' . $artikel->thumbnail) }}" class="img-fluid" alt="{{ $artikel->slug }}">
                                        </div>
                                    @endif
                                    <div class="col-md-7">
                                        <div class="card-body mt-0 pt-0">
                                            <a class="card-link text-primary" href="#">
                                                {{ $artikel->kategori->nama }}
                                            </a>
                                            <h5 class="card-title mt-2 h5">{{ $artikel->judul }}</h5>
                                            <p class="fs-6">{{ Str::limit(strip_tags($artikel->konten), 200, '..') }}</p>
                                            <a href="{{ route('artikel', $artikel->slug) }}"
                                                class="text-capitalize btn btn-outline-primary px-4 py-2 rounded-0">Selengkapnya..</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Pagination --}}
                        <div id="pagination-links">
                            {{ $artikels->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-xl-3 offset-xl-1 d-none d-lg-block">
                    <div class="widget mb-5">
                        <h3 class="h4 mb-3">Informasi Terbaru</h3>

                        @foreach ($informasi_terbaru->take(2) as $info_baru)
                            <div class="card mb-4 border-0">
                                <div class="row g-0">
                                    @if (!empty($info_baru->thumbnail))
                                        <div class="col-md-2 col-lg-4">
                                            <img src="{{ asset('thumbnails/' . $info_baru->thumbnail) }}" alt="{{ $info_baru->slug }}" class="img-fluid">
                                        </div>
                                    @endif
                                    <div class="col-md-10 col-lg-8">
                                        <h4 class="fs-6 ms-3"><a href="{{ '/artikel/' . $info_baru->slug }}"
                                                class="text-dark">{{ Str::limit($info_baru->judul, 40, '..') }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="widget category-widget">
                        <h3 class="h4 mb-3">Kategori</h3>
                        <ul class="list-inline tag-list">
                            @foreach ($kategoris->unique('id_kategori') as $kategori)
                                <li class="list-inline-item m-1">
                                    <a href="{{ route('kategori', $kategori->kategori->kategori) }}">{{ $kategori->kategori->kategori }}
                                        <small>

                                            ({{ $kategori->where('id_kategori', $kategori->kategori->id)->get('id_kategori')->count() }})
                                        </small>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endif

@if ($pedomans)
    <section id="pedoman" class="hero-area" style="background-color: #f9f9f9">
        <div class="container text-center">
            <div class="section-title mb-md-4 pt-4" id="layanan">
                <h2>Pedoman-
                    <strong>
                        Pedoman
                        <svg width="198" height="21" viewBox="0 0 198 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 18.7327C13.8854 9.74093 29.4859 8.69377 43.6964 6.03115C65.1095 2.01897 86.6266 1.40829 108.405 2.01061C137.628 2.81881 166.558 7.3721 195.577 11.0296"
                                stroke="#1b36f7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </strong>
                </h2>
            </div>
            @foreach ($pedomans as $pedoman)
                <div class="dflip _df_thumb" source="{{ asset('pedoman/pdf/' . $pedoman->pedoman) }}" thumb="{{ asset('pedoman/cover/' . $pedoman->cover) }}"
                    style="height: 400px; width: 300px">{{ $pedoman->judul }}
                </div>
            @endforeach
        </div>
    </section>
@endif
