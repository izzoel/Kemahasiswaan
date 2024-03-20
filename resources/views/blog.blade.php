@php
    use App\Models\Post;
@endphp

<section class="blog section mt-2" id="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="h4 mb-3">Postingan Kemahsiswaan</h4>
                    @foreach ($artikels as $artikel)
                        <div class="card mb-5 border-0 font-primary">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src=" {{ asset('storage/' . $post->thumbnail) }}"
                                        class="img-fluid blog-card-img" alt="blog-img">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body mt-0 pt-0">
                                        <a class="card-link text-primary" href="#">{{ $post->kategori->nama }}</a>
                                        <h5 class="card-title mt-2 h5">{{ $post->judul }}</h5>
                                        <p class="fs-6">{{ $post->excerpt }}..</p>
                                        <a href="#"
                                            class="text-capitalize btn btn-outline-primary px-4 py-2 rounded-0">Selengkapnya..</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div>{{ $artikels->links('pagination::bootstrap-4') }}</div>
            </div>

            <div class="col-lg-4 col-xl-3 offset-xl-1">
                <div class="widget mb-5">
                    <h3 class="h4 mb-3">Informasi Terbaru</h4>

                        @foreach ($informasi_terbaru as $info_baru)
                            <div class="card mb-4 border-0">
                                <div class="row g-0">
                                    <div class="col-md-2 col-lg-4">
                                        <img src="{{ asset('storage/' . $info_baru->thumbnail) }}" alt="blog"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-md-10 col-lg-8">
                                        <h4 class="fs-6 ms-3"><a href="blog-single.html"
                                                class="text-dark">{{ $info_baru->judul }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>

                <div class="widget category-widget">
                    <h3 class="h4 mb-3">Kategori</h4>
                        <ul class="list-group mb-4">
                            @foreach ($artikels->unique('id_kategori') as $artikel)
                                <li class="border-bottom py-2">
                                    <a href="#!"
                                        class="d-flex justify-content-between align-items-center text-dark">
                                        {{ $artikel->kategori->nama }}
                                        <span class="badge bg-primary py-1 px-2 rounded-pill fs-6">
                                            {{ $artikel->where('id_kategori', $artikel->kategori->id)->get('id_kategori')->count() }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="list-inline tag-list">
                            @foreach ($artikels->unique('id_kategori') as $artikel)
                                <li class="list-inline-item m-1"><a href="#">{{ $artikel->kategori->nama }}</a>
                                </li>
                            @endforeach
                        </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<!--================== Blog Section End ==================-->
