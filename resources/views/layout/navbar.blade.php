<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse-left">
        <ul class="navbar-nav flex-row align-items-center">
            <li>
                <a class="nav-link" href="{{ url('/admin/dashboard') }}">KEMAHASISWAAN</a>
            </li>
            <div class="text-muted fw-semibold px-2 fs-5"> / </div>
            @php
                $segments = request()->segments();
                $url = url('/');
            @endphp

            @foreach ($segments as $key => $segment)
                @if ($key > 0)
                    <div class="text-muted fw-semibold px-2 fs-5"> / </div>
                @endif

                @php
                    $url .= '/' . $segment;
                @endphp

                <li>
                    @if ($key < 2)
                        <span class="nav-link text-muted">{{ ucwords(str_replace('-', ' ', $segment)) }}</span>
                    @else
                        <a class="nav-link" href="{{ $url }}">
                            {{ ucwords(str_replace('-', ' ', $segment)) }}
                        </a>
                    @endif
                </li>
            @endforeach

        </ul>
    </div>


    <div class="navbar-nav-right d-flex align-items-center ms-auto" id="navbar-collapse-right">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item me-3">
                {{-- @if (auth()->check())
                    <a href="{{ route(strtolower($data['menuData']['menu']) . '_lapor') }}" class="btn btn-sm btn-outline-danger">
                        Lapor
                        @if ($data['menuData']['notif'] > 0)
                            <span class="badge">{{ $data['menuData']['notif'] }}</span>
                        @endif
                    </a>
                @elseif (auth('mahasiswa')->check())
                    <button type="button" class="laporNavbar btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#lapor_{{ strtolower($data['menuData']['menu']) }}"
                        {{ strtolower($data['menuData']['menu']) == 'dversi' && session('sudah_mengisi') ? 'disabled' : '' }}>
                        Lapor !
                    </button>
                @endif --}}
            </li>

            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if (auth()->check())
                            <img src="{{ asset('logo/' . auth()->user()->logo) }}" alt="admin" class="w-px-40 h-auto" />
                        @elseif (auth('organisasi')->check())
                            <img src="{{ asset('logo/' . auth('organisasi')->user()->logo) }}" alt="{{ auth('organisasi')->user()->nama }}" class="w-px-40 h-auto rounded-circle" />
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                    <li>
                        <a class="dropdown-item" href="{{ url('/admin/profile') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if (auth()->check())
                                            <img src="{{ asset('logo/' . auth()->user()->logo) }}" alt="admin" class="w-px-40 h-auto" />
                                        @elseif (auth('organisasi')->check())
                                            <img src="{{ asset('logo/' . auth('organisasi')->user()->logo) }}" alt="admin" class="w-px-40 h-auto" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">
                                        @if (auth()->check())
                                            {{ auth()->user()->name }}
                                        @elseif (auth('organisasi')->check())
                                            {{ auth('organisasi')->user()->name }}
                                        @endif
                                    </span>
                                    <small class="text-muted">{{ 'Kemahasiswaan' }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="U_B_profil dropdown-item" href="{{ url('/admin/profile') }}" data-id="1">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
                {{-- <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">

                                        @if (auth()->check())
                                            <img src="{{ asset('img/avatars/kemahasiswaan.png') }}" alt="admin" class="w-px-40 h-auto" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">
                                        {{ auth()->user()->name }}
                                    </span>
                                    <small class="text-muted">{{ 'Kemahasiswaan' }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul> --}}
            </li>
        </ul>
    </div>
</nav>
