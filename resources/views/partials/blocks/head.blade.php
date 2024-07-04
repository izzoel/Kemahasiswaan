<!--================== Header Section Start ==================-->
<div class="preloader">
    <div class="dots">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<header class="navigation border-bottom">
    <nav class="navbar  navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fas fa-users"></i>
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- <a class="site_title"> --}}
                <img src="{{ asset('images/site.png') }}" alt="" width="300" height="300"
                    class="img-fluid">
                {{-- </a> --}}
                {{-- <b style="color: black">kemahasiswaan</b> --}}
                <span class="text-white p-1 rounded" style="background-color: #09114d">.unbl</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color: black !important">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="https://tracer.unbl.ac.id/"
                            style="color: black !important; text-decoration: none;">
                            <span class=" p-2 pr-4 pl-4 rounded"
                                style="background-color: #FF5733; color: white !important; border: 1px solid #FF5733;"
                                onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='black';this.style.border='1px solid #FF5733';"
                                onmouseout="this.style.backgroundColor='#FF5733'; this.style.color='white';this.style.borderColor='#FF5733';">
                                Tracer
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @@informasi" href="{{ route('informasi') }}"
                            style="color: black !important; text-decoration: none;">
                            <span onmouseover="this.style.color='red'"
                                onmouseout="this.style.color='black'">Informasi</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @@about" href="about.html" style="color: black !important">
                            <span onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">Beasiswa
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @@prestasi" href="{{ route('prestasi') }}"
                            style="color: black !important">
                            <span onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">Prestasi
                            </span>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @@portfolio @@portfolio-single"
                            href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: black !important">
                            Prestasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item @@portfolio" href="portfolio.html"
                                    style="color: black !important">Portfolio</a>
                            </li>
                            <li><a class="dropdown-item @@portfolio-single" href="portfolio-single.html"
                                    style="color: black !important">Portfolio single</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--================== Header Section End ==================-->
