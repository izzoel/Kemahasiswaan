<div class="modal modalUpdate fade" id="M_U_prestasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_prestasi" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
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
                        <label class="form-label" for="U_prestasi">Prestasi</label>
                        <input type="text" class="form-control" id="U_prestasi" name="prestasi" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="U_tahun">Tahun Prestasi</label>
                            <input type="text" class="form-control" id="U_tahun" name="tahun" readonly />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="U_jenis">Jenis</label>
                            <input type="text" class="form-control" id="U_jenis" name="jenis" readonly />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="U_raihan">Raihan</label>
                            <input type="text" class="form-control" id="U_raihan" name="raihan" readonly />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="U_tingkat">Tingkat</label>
                            <input type="text" class="form-control" id="U_tingkat" name="tingkat" readonly />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="U_sertifikat">Sertifikat</label>
                        <div id="U_sertifikat_link" class=""></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_dokumentasi">Dokumentasi</label>
                        <div id="U_dokumentasi_link" class=""></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_foto">Foto</label>
                        <div id="U_foto_link" class=""></div>
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

<div class="modal modalDelete fade" id="M_D_prestasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_prestasi">Konfirmasi Hapus</h5>
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
