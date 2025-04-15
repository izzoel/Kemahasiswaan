<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse-left">
        <ul class="navbar-nav flex-row align-items-center">
            <li>
                <a class="nav-link d-flex align-items-center" href="{{ url('/admin/dashboard') }}">
                    <span class="d-none d-md-inline">KEMAHASISWAAN</span>
                </a>
            </li>
            <div class="text-muted fw-semibold px-2 fs-5 d-none d-md-inline"> / </div>

            @php
                $segments = request()->segments();
                $url = url('/');
            @endphp

            @foreach ($segments as $key => $segment)
                @if ($key > 0)
                    <div class="text-muted fw-semibold px-2 fs-5 d-none d-md-inline"> / </div>
                @endif

                @php
                    $url .= '/' . $segment;
                @endphp

                <li>
                    @if ($key < 2)
                        <span class="nav-link text-muted d-none d-md-inline">
                            {{ ucwords(str_replace('-', ' ', $segment)) }}
                        </span>
                    @else
                        <a class="nav-link d-none d-md-inline" href="{{ $url }}">
                            {{ ucwords(str_replace('-', ' ', $segment)) }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>

        <!-- Ini untuk elemen tambahan di layar kecil -->
        <ul class="navbar-nav flex-row align-items-center d-block d-md-none">
        </ul>
    </div>



    <div class="navbar-nav-right d-flex align-items-center ms-auto" id="navbar-collapse-right">
        <ul class="navbar-nav flex-row align-items-center ms-auto">

            @php
                use App\Models\Beasiswa;
                use App\Models\Konseling;
                use App\Models\Dana;
                use App\Models\Kegiatan;

                $pendingBeasiswa = Beasiswa::where('status', 'pending')->get();
                $baruKonseling = Konseling::where('status', 'baru')->get();
                $baruDana = Dana::where('status', 'Ditinjau')->get();
                $baruKegiatan = Kegiatan::where('status', 'Ditinjau')->get();
                $jumlahNotif = $pendingBeasiswa->count() + $baruKonseling->count() + $baruDana->count() + $baruKegiatan->count();
            @endphp
            @if (auth()->check())
                @if ($jumlahNotif > 0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                            <i class='bx bx-bell' style='color:#ff3e1d; font-size: 1.8rem'></i>
                            <span class="translate-middle badge rounded-pill bg-danger">
                                {{ $jumlahNotif }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" id="dropdown-notifikasi">
                            @foreach ($pendingBeasiswa as $beasiswa)
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ url('/admin/data/beasiswa') }}">
                                        <div style="font-size: 0.85rem">
                                            Beasiswa <strong>{{ $beasiswa->beasiswa }}</strong>
                                            <span class="badge bg-danger">{{ $beasiswa->mahasiswa->nama }}</span> menunggu
                                            <span class="badge bg-danger">verifikasi</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            @foreach ($baruKonseling as $konseling)
                                <li>
                                    <a class="dropdown-item" style="font-size: 0.8rem" href="{{ url('/admin/layanan/konseling') }}">
                                        Konseling <strong>baru</strong>
                                        <span class="badge bg-danger">{{ $konseling->mahasiswa->nama }}</span> terjadwal
                                        <span class="badge bg-danger">{{ $konseling->tanggal }}</span>
                                    </a>
                                </li>
                            @endforeach
                            @foreach ($baruDana as $dana)
                                <li>
                                    <a class="dropdown-item" style="font-size: 0.8rem" href="{{ url('/admin/layanan/dana') }}">
                                        <span class="badge bg-warning">{{ $dana->organisasi->nama }}</span> Pengajuan Dana <strong>baru</strong> menunggu
                                        <span class="badge bg-warning">verifikasi</span>
                                    </a>
                                </li>
                            @endforeach
                            @foreach ($baruKegiatan as $kegiatan)
                                <li>
                                    <a class="dropdown-item" style="font-size: 0.8rem" href="{{ url('/admin/layanan/kegiatan') }}">
                                        <span class="badge bg-info">{{ $kegiatan->organisasi->nama }}</span> Pengajuan Kegiatan <strong>baru</strong> menunggu
                                        <span class="badge bg-info">verifikasi</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endif
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if (auth()->check())
                            <img src="{{ asset('logo/' . auth()->user()->logo) }}" alt="admin" class="w-px-40 h-auto" />
                        @elseif (auth('organisasi')->check())
                            <img src="{{ asset('logo/' . auth('organisasi')->user()->logo) }}" alt="{{ auth('organisasi')->user()->nama }}"
                                class="w-px-40 h-auto rounded-circle" />
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
                                            {{ auth('organisasi')->user()->nama }}
                                        @endif
                                    </span>
                                    @if (auth()->check())
                                        <small class="text-muted">Kemahasiswaan<small>
                                            @elseif (auth('organisasi')->check())
                                                <small class="text-muted">Organisasi Mahasiswa</small>
                                    @endif
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
            </li>
        </ul>
    </div>
</nav>
