<!-- Modal Tambah-->
<div class="modal fade" id="tambahArtikel" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog" style="min-width: 95%">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Artikel <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-artikel') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Judul Artikel</label>
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
                                            onchange="document.getElementById('thumbnail-label').textContent = this.files[0].name"
                                            accept="image/*">
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


@foreach ($artikels as $artikel)
    <div class="modal fade" id="edit-artikel{{ $artikel->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog" style="min-width: 95%">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Artikel <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-artikel', $artikel->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 ">Judul Artikel</label>
                                    <div class="col-md-11 col-sm-11 ">
                                        <textarea class="resizable_textarea form-control rounded" placeholder="..." name="judulEdit" required>{{ $artikel->judul }}</textarea>
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
                                        <select id="kategoriEdit" name="kategoriEdit" class="form-control p-2">
                                            <option value="{{ $artikel->kategori->id }}" selected>
                                                {{ $artikel->kategori->nama }}
                                            </option>
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
                                        <div class="input-group">
                                            <img src="{{ asset('storage/' . $artikel->thumbnail) }}"
                                                class="img-responsive center-block d-block mx-auto"
                                                style="max-width: 200px; max-height: 200px;">
                                            <div class="custom-file">
                                                <input type="file" class="form-control-file" id="thumbnail"
                                                    name="thumbnailEdit" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <textarea name="kontenEdit" id="summernoteEdit{{ $artikel->id }}">{{ $artikel->konten }}</textarea>
                        <input type="hidden" name="excerptEdit" id="excerptEdit{{ $artikel->id }}">
                        <input type="hidden" name="thumbnail" value="{{ $artikel->thumbnail }}">

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
