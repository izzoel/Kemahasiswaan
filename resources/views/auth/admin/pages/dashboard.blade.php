<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 order-0 mb-4">
            <div class="card h-100">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Aktifitas Ormawa</h5>
                        <div id="chartLogbook" class="px-3" style="min-height: 315px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary" type="button" id="growthReportId" data-bs-toggle="dropdown">
                                2025
                            </button>
                        </div>
                    </div>
                </div>
                <div id="growthChart" style="min-height: 154.875px;">
                    <div id="gaugeTransaksi"></div>
                </div>
                <div class="text-center mb-4 px-3">
                    @if (auth()->check())
                        @foreach ($data['organisasi'] as $organisasi)
                            @php
                                $color = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random();
                            @endphp
                            <span class="badge {{ 'bg-label-' . $color }}">{{ $organisasi->nama }}</span>
                        @endforeach
                    @elseif (auth('organisasi')->check())
                        @foreach ($data['struktur'] as $struktur)
                            @php
                                $color = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random();
                            @endphp
                            <div class="d-flex align-items-center mb-1">
                                <span class="badge {{ 'bg-label-' . $color }}">{{ $struktur->mahasiswa->nama }}</span>
                                <div class="flex-grow-1 border-bottom mx-2"></div>
                                <span class="badge {{ 'bg-label-' . $color }}">{{ $struktur->jabatan }}</span>
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="resize-triggers">
                    <div class="expand-trigger">
                        <div style="width: 256px; height: 377px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->check())
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Prestasi <span class="badge bg-label-primary">{{ $data['tahun_prestasi_sekarang'] }}</span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">{{ $data['total_prestasi'] }}</h2>
                                <span>Prestasi Mahasiswa</span>
                            </div>
                            <div id="prestasiChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-football'></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Olahraga</h6>
                                        <small class="text-muted">{{ implode(', ', $data['olahraga']) . ', ...' }}</small>

                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_prestasi_olahraga'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-success"><i class='bx bxs-flask'></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Sains</h6>
                                        <small class="text-muted">{{ implode(', ', $data['sains']) . ', ...' }}</small>

                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_prestasi_sains'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-paint'></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Seni</h6>
                                        <small class="text-muted">{{ implode(', ', $data['seni']) . ', ...' }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_prestasi_seni'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-info"><i class="bx bx-trophy "></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Lainnya</h6>
                                        <small class="text-muted">{{ implode(', ', $data['lainnya']) . ', ...' }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_prestasi_lainnya'] }}</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Beasiswa <span class="badge bg-label-primary">{{ $data['tahun_beasiswa_sekarang'] }}</span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">{{ $data['total_beasiswa'] }}</h2>
                                <span>Beasiswa</span>
                            </div>
                            <div id="beasiswaChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-success"><i class='bx bxs-graduation'></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Akademik</h6>
                                        <small class="text-muted">{{ $data['nama_mahasiswa_akademik'] }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_beasiswa_akademik'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-trophy'></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Non Akademik</h6>
                                        <small class="text-muted">{{ $data['nama_mahasiswa_nonakademik'] }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_beasiswa_nonakademik'] }}</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Konseling <span class="badge bg-label-primary">{{ $data['tahun_konseling_sekarang'] }}</span></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">{{ $data['total_konseling'] }}</h2>
                                <span>Mahasiswa</span>
                            </div>
                            <div id="konselingChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-error-circle "></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Baru</h6>
                                        <small class="text-muted">{{ $data['konseling_baru'] }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_konseling_baru'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-check-circle "></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Selesai</h6>
                                        <small class="text-muted">{{ $data['konseling_selesai'] }}</small>

                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $data['total_konseling_selesai'] }}</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="content-backdrop fade"></div>
