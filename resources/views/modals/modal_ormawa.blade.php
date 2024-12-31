<!-- Modal Tambah-->
<div class="modal fade" id="tambahOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Ormawa <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-ormawa') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Nama Organisasi</label>
                                <div class="col-sm-10 ">
                                    <input class="form-control rounded" placeholder="..." id="nama-ormawa" name="nama" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Logo</label>
                                <div class="input-group mb-3 col-sm-10 ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo"
                                            onchange="document.getElementById('logo-label').textContent = this.files[0].name" accept="image/*">
                                        <label class="custom-file-label" id="logo-label" for="logo">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Keterangan</label>
                                <div class="col-sm-10 ">
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Anggaran</label>
                                <div class="col-sm-10 ">
                                    <input class="form-control rounded" placeholder="..." id="anggaran" name="anggaran" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Periode</label>
                                <div class="col-sm-10 ">
                                    <select id="id_periode" name="id_periode" class="form-control p-2" required>
                                        <option value="0" disabled selected> -- Pilih -- </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Username</label>
                                <div class="col-sm-10 ">
                                    <input class="form-control rounded" placeholder="..." id="username" name="username" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm-2 ">Password</label>
                                <div class="col-sm-10 ">
                                    <input type="password" class="form-control rounded" placeholder="..." id="password" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($ormawas as $ormawa)
    <div class="modal fade" id="edit-ormawa{{ $ormawa->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Ormawa <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-ormawa', $ormawa->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 ">Nama Organisasi</label>
                                        <div class="col-sm-10 ">
                                            <input class="form-control rounded" placeholder="..." name="namaEdit" required value="{{ $ormawa->nama }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 ">Logo</label>
                                        <div class="input-group mb-3 col-sm-10 ">
                                            <div class="input-group">
                                                <img src="{{ asset('storage/' . $ormawa->logo) }}" class="img-responsive center-block d-block mx-auto"
                                                    style="max-width: 150px; max-height: 150px;">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control-file" id="logo" name="logoEdit" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 ">Keterangan</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keteranganEdit" required>{{ $ormawa->keterangan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 ">Anggaran</label>
                                        <div class="col-sm-10 ">
                                            <input class="form-control rounded" placeholder="..." id="anggaranEdit" name="anggaranEdit" required
                                                value="{{ $ormawa->anggaran }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">periode</label>
                                        <div class="col-sm-10 ">
                                            <select name="periodeEdit" class="form-control p-2">
                                                @foreach ($periodes as $periode)
                                                    <option value="{{ $periode->id }}" {{ $periode->id == $ormawa->id_periode ? 'selected' : '' }}>
                                                        {{ $periode->periode }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 ">Username</label>
                                        <div class="col-sm-10 ">
                                            <input class="form-control rounded" placeholder="..." id="username" name="usernameEdit" required
                                                value="{{ \App\Models\User::find($ormawa->id)->username }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 ">Password</label>
                                        <div class="col-sm-10 ">
                                            <input type="password" class="form-control rounded" placeholder="..." id="password" name="passwordEdit">
                                            <small id="passwordHelp" class="form-text text-muted col-12">
                                                <span style="color:red">*</span> password baru
                                            </small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="logo" value="{{ $ormawa->logo }}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="periodeIni" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Periode <span class="badge bg-warning text-dark">Setting</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body d-flex align-items-center justify-content-center">
                <form method="POST" action="{{ route('show-ormawa', request('periodePilih')) }}">
                    @csrf
                    <div class="btn-group-vertical mx-auto">
                        @foreach ($periodes as $periode)
                            <button type="submit" name="periodePilih" class="btn btn-primary btn-sm rounded mb-1 mt-0"
                                value="{{ $periode->periode }}">{{ $periode->periode }}</button>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning rounded mr-auto" data-toggle="modal" data-target="#settingPeriode"><i class="fa fa-cog"></i> Setting Periode</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="settingPeriode" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Periode <span class="badge bg-warning text-dark">Setting</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table id="periodeTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="col-auto">#</th>
                            <th class="col-auto">Periode</th>
                            <th class="col-auto">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodes as $periode)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $periode->periode }}</td>
                                <td>
                                    <div class="btn-group mr-2" role="group">
                                        <a href="{{ route('delete-periode', $periode->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                    <div class="btn-group mr-2" role="group">
                                        <button class="btn btn-sm btn-warning text-dark" data-toggle="modal" data-target="#edit-periode{{ $periode->id }}">Edit</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahPeriode" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Periode <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-periode') }}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-sm">Periode</label>
                                <div class="col-sm ">
                                    <input class="form-control rounded" placeholder="..." id="periode" name="periode" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@foreach ($periodes as $periode)
    <div class="modal fade" id="edit-periode{{ $periode->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Periode <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-periode', $periode->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-sm">Periode</label>
                                    <div class="col-sm ">
                                        <input class="form-control rounded" placeholder="..." name="periodeEdit" required value="{{ $periode->periode }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
