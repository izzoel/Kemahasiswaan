<!-- Modal Tambah-->
<div class="modal fade" id="tambahProker" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Program Kerja <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-proker') }}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Program Kerja</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." id="nama" name="nama"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Tanggal Pelaksanaan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control rounded" name="tanggal"
                                        placeholder="..." />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Anggaran</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control rounded" name="anggaran" id="anggaran"
                                        placeholder="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Keterangan</label>
                                <div class="col-md-8 ">
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan"></textarea>
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

@foreach ($prokers as $proker)
    <div class="modal fade" id="edit-proker{{ $proker->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Anggota <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-proker', $proker->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Program Kerja</label>
                                    <div class="col-md-8">
                                        <input class="form-control rounded" placeholder="..." name="namaEdit" required
                                            value="{{ $proker->nama }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tanggal Pelaksanaan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control rounded" name="tanggalEdit"
                                            value="{{ $proker->tanggal }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Anggaran</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control rounded" name="anggaranEdit"
                                            placeholder="..." value="{{ $proker->anggaran }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Keterangan</label>
                                    <div class="col-md-8 ">
                                        <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keteranganEdit"
                                            value="{{ $proker->keterangan }}"></textarea>
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
