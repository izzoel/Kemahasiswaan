<div class="modal fade" id="M_S_pedoman" data-bs-backdrop="static" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Pedoman <span class="badge bg-primary text-white">Baru</span>
                    </h5>
                    <button type="button" class="modalPedoman btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="judul">Judul<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="pedoman">File Pedoman<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="pedoman" name="pedoman" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cover">Cover Pedoman<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="cover" name="cover" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modalPerdoman btn btn-outline-secondary" data-bs-target="#M_S_pedoman" data-bs-toggle="modal" data-bs-dismiss="modal">
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

<div class="modal modalUpdate fade" id="M_U_pedoman" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_pedoman" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        Pedoman <span class="badge bg-primary text-white">Edit</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="U_judul">Judul</label>
                        <input type="text" class="form-control" id="U_judul" name="judul" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_pedoman">File Pedoman</label>
                        <input type="file" class="form-control" id="U_pedoman" name="pedoman" />
                        <div id="U_pedoman_link"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_cover">Cover Pedoman</label>
                        <input type="file" class="form-control" id="U_cover" name="cover" />
                        <div class="mt-2">
                            <img id="preview_cover" src="" alt="cover" class="img-thumbnail" width="100">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modalKategori btn btn-outline-secondary" data-bs-dismiss="modal">
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

<div class="modal modalDelete fade" id="M_D_pedoman" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_pedoman">Konfirmasi Hapus</h5>
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
