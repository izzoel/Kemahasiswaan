<div class="modal fade" id="M_S_artikel" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="min-width: 95%">
        <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}" method="POST" enctype="multipart/form-data"
            class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">
                    Artikel <span class="badge bg-primary text-white">Baru</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="judul" class="form-label col-md-1 col-sm-1 ">Judul Artikel</label>
                        <div class="col-md">
                            <textarea id="judul" class="resizable_textarea form-control rounded" placeholder="..." name="judul" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="kategori" class="form-label">Kategori
                            <button type="button" class="btn btn-xs btn-primary" data-bs-target="#M_S_kategori" data-bs-toggle="modal" data-bs-dismiss="modal">
                                &#10010;
                            </button>

                        </label>
                        <div class="col-md-11 col-sm-11 ">
                            <select class="form-select" id="kategori" name="kategori"></select>
                        </div>
                    </div>
                    <div class="col mb-0">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                    </div>
                </div>

                <div class="col mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea name="konten" id="summernote"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="modal modalUpdate fade" id="M_U_artikel" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="min-width: 95%">
        <div class="modal-content">
            <form id="U_route" action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Artikel <span class="badge bg-primary text-white">Edit</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="judul" class="form-label col-md-1 col-sm-1 ">Judul Artikel</label>
                                    <div class="col-md">
                                        <textarea id="U_judul" class="resizable_textarea form-control rounded" placeholder="..." name="judul" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="kategori" class="form-label">Kategori
                                        <button type="button" class="btn btn-xs btn-primary" data-bs-target="#M_S_kategori" data-bs-toggle="modal" data-bs-dismiss="modal">
                                            &#10010;
                                        </button>

                                    </label>
                                    <div class="col-md-11 col-sm-11 ">
                                        <select class="form-select" id="U_kategori" name="kategori"></select>
                                    </div>
                                </div>
                                <div class="col mb-0">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input class="form-control" type="file" id="U_thumbnail" name="thumbnail">
                                    <div class="mt-2">
                                        <img id="preview_thumbnail" src="" alt="Thumbnail" class="img-thumbnail" width="100">
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-3">
                                <label for="konten" class="form-label">Konten</label>
                                <textarea name="konten" id="U_summernote"></textarea>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modalDelete fade" id="M_D_artikel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_artikel">Konfirmasi Hapus</h5>
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
