<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($artikels as $artikel)
                    <div class="card mb-5 border-0 font-primary">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ asset('thumbnails/' . $artikel->thumbnail) }}" class="img-fluid" alt="{{ $artikel->slug }}">
                            </div>
                            <div class="col-md-7">
                                <div class="ms-3">
                                    <a class="card-link text-primary" href="#">{{ $artikel->kategori->kategori }}</a>
                                    <h2 class="card-title h5">
                                        <a href="{{ route('artikel', $artikel->slug) }}" class="text-dark">{{ $artikel->judul }}</a>
                                    </h2>
                                    <p class="fs-6">{{ Str::limit(strip_tags($artikel->konten), 200, '..') }}</p>
                                </div>
                                {{-- <div class="card-body">
                                    <p class="fs-6">{{ Str::limit(strip_tags($artikel->konten), 100, '..') }}</p>

                                </div> --}}

                                {{-- <div class="card-footer bg-transparent border-0 mt-5 mt-lg-0 p-0">
                                    <a href="blog-single.html" class="text-capitalize btn btn-outline-primary px-4 py-2 rounded-0">counting reading</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-xl-3 offset-xl-1">
                <div class="widget mb-5">
                    <h3 class="h4 mb-3">Newsletter</h3>
                    <form>
                        <input type="text" class="form-control mb-3 rounded-0" placeholder="Enter email" aria-label="Enter email">
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary rounded-0">Subscribe</button>
                        </div>
                    </form>
                    <p class="form-text">Get special offers on the latest developments from Front.</p>
                </div>

                <div class="widget mb-5">
                    <h3 class="h4 mb-3">Most Read</h3>
                    <div class="card mb-4 border-0">
                        <div class="row g-0">
                            <div class="col-md-2 col-lg-4">
                                <img src="images/blog/blog-1.jpg" alt="blog" class="img-fluid">
                            </div>
                            <div class="col-md-10 col-lg-8">
                                <h4 class="fs-6 ms-3"><a href="blog-single.html" class="text-dark">CSS Float: A Tutorial</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- card-end -->
                    <div class="card mb-4 border-0">
                        <div class="row g-0">
                            <div class="col-md-2 col-lg-4">
                                <img src="images/blog/blog-2.jpg" alt="blog" class="img-fluid">
                            </div>
                            <div class="col-md-10 col-lg-8">
                                <h4 class="fs-6 ms-3"><a href="blog-single.html" class="text-dark">Ask HN: Does Anybody Still Use JQuery?</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- card-end -->
                    <div class="card mb-4 border-0">
                        <div class="row g-0">
                            <div class="col-md-2 col-lg-4">
                                <img src="images/blog/blog-3.jpg" alt="blog" class="img-fluid">
                            </div>
                            <div class="col-md-10 col-lg-8">
                                <h4 class="fs-6 ms-3"><a href="blog-single.html" class="text-dark">Website Design Mockup Into Code Automatically</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- card-end -->
                    <div class="card mb-4 border-0">
                        <div class="row g-0">
                            <div class="col-md-2 col-lg-4">
                                <img src="images/blog/blog-4.jpg" alt="blog" class="img-fluid">
                            </div>
                            <div class="col-md-10 col-lg-8">
                                <h4 class="fs-6 ms-3"><a href="blog-single.html" class="text-dark">Introducing JavaScript objects</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- card-end -->
                </div>

                <div class="widget category-widget">
                    <h3 class="h4 mb-3">Categoriees</h3>
                    <ul class="list-group mb-4">
                        <li class="border-bottom py-2">
                            <a href="#!" class="d-flex justify-content-between align-items-center text-dark">
                                Css
                                <span class="badge bg-primary py-1 px-2 rounded-pill fs-6">14</span>
                            </a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="#!" class="d-flex justify-content-between align-items-center text-dark">
                                JavaScript
                                <span class="badge bg-primary py-1 px-2 rounded-pill fs-6">14</span>
                            </a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="#!" class="d-flex justify-content-between align-items-center text-dark">
                                JQuery
                                <span class="badge bg-primary py-1 px-2 rounded-pill fs-6">14</span>
                            </a>
                        </li>
                        <li class="border-bottom py-2">
                            <a href="#!" class="d-flex justify-content-between align-items-center text-dark">
                                Web Design
                                <span class="badge bg-primary py-1 px-2 rounded-pill fs-6">14</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="list-inline tag-list">
                        <li class="list-inline-item m-1"><a href="#">Css</a></li>
                        <li class="list-inline-item m-1"><a href="#">JavaScript</a></li>
                        <li class="list-inline-item m-1"><a href="#">jQuery</a></li>
                        <li class="list-inline-item m-1"><a href="#">Web design</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</section>
