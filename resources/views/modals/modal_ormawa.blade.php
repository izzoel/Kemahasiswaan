<!-- Modal Tambah-->
<div class="modal fade" id="tambahOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog" style="min-width: 95%">
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
                                <label class="control-label col-md-1 col-sm-1 ">Nama Organisasi</label>
                                <div class="col-md-11 col-sm-11 ">
                                    <input class="form-control rounded" placeholder="..." id="nama" name="nama"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Logo</label>
                                <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo"
                                            onchange="document.getElementById('logo-label').textContent = this.files[0].name"
                                            accept="image/*">
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
                                <label class="control-label col-md-1 col-sm-1 ">Keterangan</label>
                                <div class="col-md-11 col-sm-11 ">
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Username</label>
                                <div class="col-md-11 col-sm-11 ">
                                    <input class="form-control rounded" placeholder="..." id="username" name="username"
                                        required>
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
    <div class="modal fade" id="edit-ormawa{{ $ormawa->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog" style="min-width: 95%">
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
                                        <label class="control-label col-md-1 col-sm-1 ">Nama Organisasi</label>
                                        <div class="col-md-11 col-sm-11 ">
                                            <input class="form-control rounded" placeholder="..." name="namaEdit"
                                                required value="{{ $ormawa->nama }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-1 col-sm-1 ">Logo</label>
                                        <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                            <div class="input-group">
                                                <img src="{{ asset('storage/' . $ormawa->logo) }}"
                                                    class="img-responsive center-block d-block mx-auto"
                                                    style="max-width: 150px; max-height: 150px;">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control-file" id="logo"
                                                        name="logoEdit" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-1 col-sm-1 ">Keterangan</label>
                                        <div class="col-md-11 col-sm-11 ">
                                            <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keteranganEdit" required>{{ $ormawa->keterangan }}</textarea>
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
