<!-- Modal Tambah-->
<div class="modal fade" id="tambahGaleri" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog" style="min-width: 95%">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Galeri <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-galeri') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Gambar</label>
                                <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar"
                                            onchange="document.getElementById('gambar-label').textContent = this.files[0].name"
                                            accept="image/*">
                                        <label class="custom-file-label" id="gambar-label" for="gambar">Choose
                                            file</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Deskripsi</label>
                                <div class="col-md-11 col-sm-11 ">
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="deskripsi" required></textarea>
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

@foreach ($galeris as $galeri)
    <div class="modal fade" id="edit-galeri{{ $galeri->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog" style="min-width: 95%">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Galeri <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-galeri', $galeri->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 ">Gambar</label>
                                    <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                        <div class="input-group">
                                            <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                                class="img-responsive center-block d-block mx-auto"
                                                style="max-width: 200px; max-height: 200px;">
                                            <div class="custom-file">
                                                <input type="file" class="form-control-file" id="gambar"
                                                    name="gambarEdit" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 ">Deskripsi</label>
                                    <div class="col-md-11 col-sm-11 ">
                                        <textarea class="resizable_textarea form-control rounded" placeholder="..." name="deskripsiEdit" required>{{ $galeri->deskripsi }}</textarea>
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
                                            <option value="{{ $galeri->kategori->id }}" selected>
                                                {{ $galeri->kategori->nama }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <textarea name="kontenEdit" id="summernoteEdit{{ $galeri->id }}" style="display: none;">{{ $galeri->konten }} </textarea>
                        <input type="hidden" name="excerptEdit" id="excerptEdit{{ $galeri->id }}">
                        <input type="hidden" name="gambar" value="{{ $galeri->gambar }}">

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
