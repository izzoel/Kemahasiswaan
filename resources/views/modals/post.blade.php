<!-- Modal Tambah-->
<div class="modal fade" id="tambahPost" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog" style="min-width: 95%">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Post <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-post') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Judul Post</label>
                                <div class="col-md-11 col-sm-11 ">
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="judul" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Kategori
                                    <a type="button" data-toggle="modal" data-target="#tambahKategori">
                                        <span class="badge badge-sm small bg-primary text-white">+</span>
                                    </a>
                                </label>
                                <div class="col-md-11 col-sm-11 ">
                                    <select id="kategori" name="kategori" class="form-control p-2">
                                        <option value="0" disabled selected> -- Pilih -- </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Thumbnail</label>
                                <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail"
                                            onchange="document.getElementById('thumbnail-label').textContent = this.files[0].name">
                                        <label class="custom-file-label" id="thumbnail-label" for="thumbnail">Choose
                                            file</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <textarea name="konten" id="summernote"></textarea>
                    <input type="hidden" name="excerpt" id="excerpt">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Posting</button>
                </div>
            </form>
        </div>
    </div>
</div>


@foreach ($posts as $post)
    <div class="modal fade" id="editPost{{ $post->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog" style="min-width: 95%">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Post <span class="badge bg-warning text-dark">Update</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-post', $post->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 ">Judul Post</label>
                                    <div class="col-md-11 col-sm-11 ">
                                        <textarea class="resizable_textarea form-control rounded" placeholder="..." name="judulEdit" required>{{ $post->judul }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 ">Kategori</label>
                                    <div class="col-md-11 col-sm-11 ">
                                        <input type="text" class="form-control rounded" id="kategori"
                                            name="kategoriEdit" placeholder="..."
                                            value="{{ $post->kategori->nama }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 ">Thumbnail</label>
                                    <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                        <div class="input-group">
                                            <img src="{{ asset('storage/' . $post->thumbnail) }}" width="400"
                                                alt="{{ $post->thumbnail }}" class="img-fluid mr-3">
                                            <div class="custom-file">
                                                <input type="file" class="form-control-file" id="thumbnail"
                                                    name="thumbnailEdit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <textarea name="kontenEdit" id="summernoteEdit{{ $post->id }}">{{ $post->konten }}</textarea>
                        <input type="hidden" name="excerptEdit" id="excerptEdit{{ $post->id }}">
                        <input type="hidden" name="thumbnail" value="{{ $post->thumbnail }}">

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


{{-- make modal kategori baru --}}
<div class="modal fade" id="tambahKategori" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Kategori <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" id="kategoriForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" class="form-control rounded" id="kategori" name="kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submitKategori">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
