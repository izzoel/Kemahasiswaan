<div class="modal modalUpdate fade" id="M_U_beasiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_beasiswa" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        Prestasi <span class="badge bg-primary text-white">Detail</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="U_nama">Nama</label>
                        <input type="text" class="form-control" id="U_nama" name="nama" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_beasiswa">Beasiswa</label>
                        <input type="text" class="form-control" id="U_beasiswa" name="beasiswa" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_prestasi">Prestasi</label>
                        <input type="text" class="form-control" id="U_prestasi" name="tahun" readonly />
                    </div>
                    <div class="divider mt-4 mb-0">
                        <div class="divider-text">Status</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_status">Status</label>
                        <select class="form-select" id="U_status" name="status">
                            <option value="pending">Pending</option>
                            <option value="diverifikasi">Diverifikasi</option>
                        </select>
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

<div class="modal modalDelete fade" id="M_D_beasiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_beasiswa">Konfirmasi Hapus</h5>
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
