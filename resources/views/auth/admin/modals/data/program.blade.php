<div class="modal fade" id="M_S_program" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Program <span class="badge bg-primary text-white">Baru</span>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="program">Program Kerja<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="program" name="program" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="pelaksanaan">Pelaksanaan <small class="text-muted">(rentang tanggal)</small><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="pelaksanaan" name="pelaksanaan" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="anggaran">Anggaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="anggaran" name="anggaran" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modalUpdate fade" id="M_U_program" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_program" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        Program <span class="badge bg-primary text-white">Edit</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="U_program">Program Kerja<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_program" name="program" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_pelaksanaan">Pelaksanaan <small class="text-muted">(rentang tanggal)</small><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_pelaksanaan" name="pelaksanaan" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_anggaran">Anggaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_anggaran" name="anggaran" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="U_keterangan" name="keterangan" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modalDelete fade" id="M_D_program" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_program">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-center">
                        Yakin ingin <span class="text-danger">menghapus</span> data?
                    </h4>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="D_route" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalView fade" id="M_V_program" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    program <span class="badge bg-primary text-white">Detail</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="table_view_{{ request()->segment(3) }}" class="table table-striped tableView table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Jabatan</th>
                            <th>Profil</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
