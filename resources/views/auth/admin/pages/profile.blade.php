@php
    $id = null;
    $user = null;

    if (auth()->check()) {
        $id = auth()->user()->id;
        $user = auth()->user()->logo;
    } elseif (auth('organisasi')->check()) {
        $id = auth('organisasi')->user()->id;
        $user = auth('organisasi')->user()->logo;
    }

    // Gunakan gambar default jika tidak ada logo
    $userLogo = $user ? asset('logo/' . $user) : asset('default-avatar.png');
@endphp
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
                            <div class="card-text">
                                <form id="profileForm" action="{{ url(request()->segment(1) . '/' . request()->segment(2) . '/password/' . $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4 mb-3 row">
                                        <label for="U_nama" class="col-md-2 col-form-label">Nama Organisasi</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="U_nama" name="nama" placeholder="...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label" for="U_keterangan">Keterangan</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="U_keterangan" name="keterangan" placeholder="..." />
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
                                    Password
                                </button>
                            </div>
                            <div class="card-text">
                                <form id="passwordForm" action="{{ url(request()->segment(1) . '/' . request()->segment(2) . '/password/' . $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4 mb-3 row">
                                        <label for="password_lama" class="col-md-2 col-form-label">Password Lama</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="password lama">
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
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
                                <form id="pictureForm" action="{{ $id ? url(request()->segment(1) . '/' . request()->segment(2) . '/picture/' . $id) : '#' }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ $userLogo }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"
                                            data-default="{{ $userLogo }}">

                                        <div class="button-wrapper">
                                            <label for="picture" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new picture</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="picture" name="logo" class="account-file-input" hidden accept="image/png, image/jpeg">
                                            </label>
                                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <p class="text-muted mb-0">Allowed JPG, GIF, or PNG. Max size of 800K</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" {{ !$id ? 'disabled' : '' }}>Simpan</button>
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
