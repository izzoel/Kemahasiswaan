<!--================== Header Section Start ==================-->
<div class="preloader">
    <div class="dots">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<header class="navigation border-bottom">
    <nav class="navbar navbar-expand-lg pl-0 pr-0">
        <div class="container-fluid d-flex flex-nowrap">
            <div class="d-none d-lg-block">
                <a class="navbar-brand pr-0 mr-0" href="" id="dev">
                    <i class="fas fa-users"></i>
                </a>
                {{-- <a class="navbar-brand pr-0 mr-0" href="" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="fas fa-users"></i>
                </a> --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/site.png') }}" alt="" width="250" height="250" class="img-fluid">
                    <span class="text-white p-1 rounded" style="background-color: #09114d">.unbl</span>
                </a>
            </div>
            <div class="d-lg-none">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/site.png') }}" alt="" width="250" height="250" class="img-fluid">
                    <span class="text-white p-1 rounded" style="background-color: #09114d">.unbl</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <i class="fas fa-bars"></i>
            </button>

        </div>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="https://tracer.unbl.ac.id/" style="color: black !important; text-decoration: none;">
                            <span class="p-2 pr-4 pl-4 rounded" style="background-color: #FF5733; color: white !important; border: 1px solid #FF5733;"
                                onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='black'; this.style.border='1px solid #FF5733';"
                                onmouseout="this.style.backgroundColor='#FF5733'; this.style.color='white'; this.style.borderColor='#FF5733';">
                                Tracer
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @@portfolio @@portfolio-single" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: {{ request()->segment(1) == 'informasi' ? 'red' : 'black' }} !important">
                            <span onmouseover="this.style.color='{{ request()->is('informasi') ? 'black' : 'red' }}'"
                                onmouseout="this.style.color='{{ request()->is('informasi') ? 'red' : 'black' }}'">Informasi</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('pedoman') }}" style="color: {{ request()->segment(2) == 'pedoman' ? 'red' : 'black' }} !important">
                                    <span onmouseover="this.style.color='{{ request()->is('informasi') ? 'black' : 'red' }}'"
                                        onmouseout="this.style.color='{{ request()->is('informasi') ? 'red' : 'black' }}'">Pedoman</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beasiswa') }}" style="color: {{ request()->is('beasiswa') ? 'red' : 'black' }} !important">
                            <span onmouseover="this.style.color='{{ request()->is('beasiswa') ? 'black' : 'red' }}'"
                                onmouseout="this.style.color='{{ request()->is('beasiswa') ? 'red' : 'black' }}'">Beasiswa</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('prestasi') }}" style="color: {{ request()->is('prestasi') ? 'red' : 'black' }} !important">
                            <span onmouseover="this.style.color='{{ request()->is('prestasi') ? 'black' : 'red' }}'"
                                onmouseout="this.style.color='{{ request()->is('prestasi') ? 'red' : 'black' }}'">Prestasi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>
<!--================== Header Section End ==================-->
