<div class="modal fade" id="M_S_organisasi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Prestasi <span class="badge bg-primary text-white">Baru</span>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="logo">Logo<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="logo" name="logo" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="anggaran">Anggaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="anggaran" name="anggaran" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="periode">Periode<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="periode" name="periode" placeholder="Pilih Tahun" required style="cursor: default;">
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

<div class="modal modalUpdate fade" id="M_U_organisasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_organisasi" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        Organisasi <span class="badge bg-primary text-white">Edit</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="U_nama">Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_logo">Logo<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="U_logo" name="logo" />
                        <div class="mt-2">
                            <img id="preview_logo" src="" alt="logo" class="img-thumbnail" width="100">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_anggaran">Anggaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_anggaran" name="anggaran" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_periode">Periode<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_periode" name="periode" placeholder="Pilih Tahun" required style="cursor: default;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="..." />
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

<div class="modal modalDelete fade" id="M_D_organisasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_organisasi">Konfirmasi Hapus</h5>
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
