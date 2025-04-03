<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row" style="display: {{ auth()->check() ? 'none' : 'block' }}">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between flex-sm-row flex-column gap-3">
                        <div class="flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <button type="button" class="btn btn-primary">
                                    My Profile
                                </button>
                            </div>
                            {{-- @foreach ($profiles as $profil)
                                <div class="card-text">
                                    <form action="{{ route('biodata') }}" method="POST}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mt-4 mb-3 row">
                                            <label for="nama" class="col-md-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="nama" name="nama" disabled
                                                    value="{{ auth()->check() ? auth()->user()->name : auth('mahasiswa')->user()->nama }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nim" class="col-md-2 col-form-label">NIM</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="nim" name="nim" disabled
                                                    value="{{ auth()->check() ? '' : auth('mahasiswa')->user()->nim }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="prodi" class="col-md-2 col-form-label">Program Studi</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="prodi" name="prodi" disabled
                                                    value="{{ auth()->check() ? '' : auth('mahasiswa')->user()->prodi }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="no_hp" class="col-md-2 col-form-label">No HP</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    value="{{ auth()->check() ? '' : auth('mahasiswa')->user()->no_hp }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    value="{{ auth()->check() ? '' : auth('mahasiswa')->user()->alamat }}">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between flex-sm-row flex-column gap-3">
                        <div class="flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <button type="button" class="btn btn-primary">
                                    Password
                                </button>
                            </div>
                            <div class="card-text">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4 mb-3 row">
                                        <label for="password_lama" class="col-md-2 col-form-label">Password Lama</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="password lama">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mt-4 mb-3 row">
                                        <label for="password_baru" class="col-md-2 col-form-label">Password Baru</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="password baru">
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-3 row">
                                        <label for="password_konfirmasi" class="col-md-2 col-form-label">Konfirmasi</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control" id="password_konfirmasi" name="password_konfirmasi" placeholder="konfirmasi password">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between flex-sm-row flex-column gap-3">
                        <div class="flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <button type="button" class="btn btn-primary">
                                    Profile Picture
                                </button>
                            </div>
                            <div class="card-text">
                                <form action="" method="POST}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        @if (auth()->check())
                                            <img src="{{ asset('img/avatars/' . auth()->user()->logo) }}" alt="user-avatar" class="d-block rounded" height="100" width="100"
                                                id="uploadedAvatar">
                                        @elseif (auth('organisasi')->check())
                                            <img src="{{ asset('logo/' . auth('organisasi')->user()->logo) }}" alt="user-avatar" class="d-block rounded" height="100"
                                                width="100" id="uploadedAvatar">
                                        @endif
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                            </label>
                                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
