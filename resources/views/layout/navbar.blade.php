<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse-left">
        <ul class="navbar-nav flex-row align-items-center">
            {{-- Segmen pertama selalu "KEMAHASISWAAN" dan memiliki href="#" --}}
            <li>
                <a class="nav-link" href="#">KEMAHASISWAAN</a>
            </li>

            @php
                $segments = request()->segments();
            @endphp

            @foreach ($segments as $key => $segment)
                @if ($key > 0)
                    {{-- Hanya untuk segmen setelah "KEMAHASISWAAN" --}}
                    <div class="text-muted fw-semibold px-2 fs-5"> / </div>
                    <li>
                        <a class="nav-link" href="{{ url(implode('/', array_slice($segments, 0, $key + 1))) }}">
                            {{ ucwords(str_replace('-', ' ', $segment)) }}
                        </a>
                    </li>
                @endif
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
                        @php
                            $adminFoto = rand(0, 11);
                        @endphp
                        @if (auth()->check())
                            <img src="{{ asset('img/avatars/kemahasiswaan.png') }}" alt="admin" class="w-px-40 h-auto" />
                            {{-- @elseif (auth('mahasiswa')->check())
                            <img src="{{ asset('img/avatars/' . auth('mahasiswa')->user()->foto) . '.png' }}" alt="{{ auth('mahasiswa')->user()->nama }}"
                                class="w-px-40 h-auto rounded-circle" /> --}}
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">

                                        @if (auth()->check())
                                            <img src="{{ asset('img/avatars/kemahasiswaan.png') }}" alt="admin" class="w-px-40 h-auto" />
                                            {{-- @elseif (auth('mahasiswa')->check())
                                            <img src="{{ asset('img/avatars/' . auth('mahasiswa')->user()->foto) . '.png' }}" alt="{{ auth('mahasiswa')->user()->nama }}"
                                                class="w-px-40 h-auto rounded-circle" /> --}}
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">
                                        {{ auth()->user()->name }}
                                        {{-- {{ auth()->check() ? auth()->user()->name : auth('mahasiswa')->user()->nama }} --}}
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
                </ul>
            </li>
        </ul>
    </div>
</nav>
