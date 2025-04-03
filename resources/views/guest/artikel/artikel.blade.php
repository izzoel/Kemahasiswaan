<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <a class="text-primary" href="#">{{ $artikels['kategori']['kategori'] }}</a>
                <h2 class="mb-3">{{ $artikels['judul'] }}</h2>
                <div class="d-flex justify-content-between mb-5">
                    <div class="d-flex align-items-center">
                        <p class="card-text small"> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $artikels['created_at'])->locale('id')->translatedFormat('d F Y') }}</p>
                    </div>

                </div>
                <div class="content">
                    @if (!empty($artikels['thumbnail']))
                        <img src="{{ asset('thumbnails/' . $artikels['thumbnail']) }}" alt="{{ $artikels['thumbnail'] }}" style="width: 1280px;">
                    @endif
                    {!! $artikels['konten'] !!}
                </div>

                {{-- <div class="comment-area">
                    <h5 class="text-capitalize mt-4 mb-4">Komentar</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-start border-bottom pb-4 mb-4">
                            <a href="#!"><img src="images/banner-img.png" alt="img" class="user-img rounded-circle me-3" width="65px"></a>
                            <div>
                                <h4 class="h6 mb-2 fw-medium">Alexender Grahambel</h4>
                                <div class="d-flex align-items-center mb-2">
                                    <small class="me-3">April 18, 2021 at 6.25 pm</small>
                                    <a href="#" class="text-primary text-capitalize fs-6">reply</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec et ipsum ullamcorper venenatis
                                    fringilla. Pretium, purus eu nec vulputate vel habitant egestas.ornare ipsum</p>
                            </div>
                        </div>

                        <div class="d-sm-flex align-items-start mb-4">
                            <div class="mb-4 mb-sm-0 me-3 d-flex">
                                <span class="me-4 mt-4"> <svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M26.1099 19L25.0159 17.906L30.3399 12.582H7.75893C3.48053 12.582 0 9.10139 0 4.82349V0H1.54719V4.82349C1.54719 8.24845 4.33388 11.0347 7.75893 11.0347H30.3399L25.0159 5.71073L26.1099 4.61674L33.3015 11.8083L26.1099 19Z"
                                            fill="#999999"></path>
                                    </svg></span>
                                <a href="#!"><img src="images/tstimonial-left-img-two.png" alt="img" class="user-img rounded-circle" width="65px"></a>
                            </div>
                            <div class="comment-single">
                                <h4 class="h6 mb-2 fw-medium">Alexender Grahambel</h4>
                                <div class="d-flex align-items-center mb-2">
                                    <small class="me-3">April 18, 2021 at 6.25 pm</small>
                                    <a href="#" class="text-primary text-capitalize fs-6">reply</a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec et ipsum ullamcorper venenatis
                                    fringilla. Pretium, purus eu nec vulputate vel habitant egestas.ornare ipsum</p>
                            </div>
                        </div>
                    </div>

                    <form action="#" class="row">
                        <div class="col-12">
                            <label for="LEAVE A REPLAY" class="text-uppercase mb-2">leave a Reply</label>
                            <textarea name="message" id="message" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" required="">
                        </div>
                        <div class="col-lg-4">
                            <input type="email" id="email" name="email" placeholder="email" class="form-control" required="">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" id="website" name="website" placeholder="website" class="form-control" required="">
                        </div>
                        <div class="col-12">
                            <div class="form-check d-flex align-items-start">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Save my name, email, and website in this browser for the next time I comment.
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-md">Post Comment</button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

</section>
