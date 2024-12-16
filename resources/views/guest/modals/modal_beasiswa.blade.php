<!-- Modal Beasiswa Nonakademik-->
<div class="modal fade" id="nonakademikModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title">
                    <h2>Beasiswa <span class="badge bg-primary text-white">Non Akademik</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-nonakademik') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <select id="nama_beasiswa_nonakademik" name="nama" class="form-control rounded" style="width: 100%;min-width: 100%;" required>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Prestasi</label>
                                <div class="col-md-8">
                                    <select id="prestasi" name="prestasi" class="form-control mb-0 rounded" style="width: 100%;min-width: 100%;" required></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
