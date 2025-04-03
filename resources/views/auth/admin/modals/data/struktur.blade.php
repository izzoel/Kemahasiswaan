<div class="modal fade" id="M_S_struktur" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Struktur <span class="badge bg-primary text-white">Baru</span>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="select_{{ request()->segment(3) }}">Nama<span class="text-danger">*</span></label>
                        <select id="select_{{ request()->segment(3) }}" name="nim" class="form-select rounded" style="width: 100%;min-width: 100%;" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jabatan">Jabatan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="profil">Profil</label>
                        <input type="file" class="form-control" id="profil" name="profil" />
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

<div class="modal modalUpdate fade" id="M_U_struktur" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_struktur" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        struktur <span class="badge bg-primary text-white">Edit</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="U_select_{{ request()->segment(3) }}">Nama<span class="text-danger">*</span></label>
                        <select id="U_select_{{ request()->segment(3) }}" name="nim" class="form-select rounded" style="width: 100%;min-width: 100%;" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_jabatan">Jabatan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_jabatan" name="jabatan" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_profil">Profil</label>
                        <input type="file" class="form-control" id="U_profil" name="profil" />
                        <div class="mt-2">
                            <img id="preview_profil" src="" alt="profil" class="img-thumbnail" width="100">
                        </div>
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

<div class="modal modalDelete fade" id="M_D_struktur" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_struktur">Konfirmasi Hapus</h5>
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
