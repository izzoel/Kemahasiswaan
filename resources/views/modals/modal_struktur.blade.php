<!-- Modal Tambah-->
<div class="modal fade" id="tambahStrukturOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Anggota <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-struktur') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." id="mahasiswa"
                                        name="mahasiswa" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Jabatan</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." id="jabatan" name="jabatan"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Program Studi</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." id="prodi" name="prodi"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_ormawa" value="{{ auth()->user()->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($strukturs as $struktur)
    <div class="modal fade" id="edit-ormawa{{ $struktur->id }}" data-backdrop="static" data-keyboard="false"
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

                <form method="POST" action="{{ route('update-ormawa', $struktur->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Nama Lengkap</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" placeholder="..." id="mahasiswa"
                                                name="mahasiswa" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Jabatan</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" placeholder="..." id="jabatan"
                                                name="jabatan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Program Studi</label>
                                        <div class="col-md-8">
                                            <input class="form-control rounded" placeholder="..." id="prodi"
                                                name="prodi" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
