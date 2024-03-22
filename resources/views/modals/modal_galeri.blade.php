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
                        <input type="text" class="form-control rounded" id="kategori-store" name="kategori-store"
                            required>
                    </div>

                    @foreach ($kategoris as $kategori)
                        <a type="button" href="{{ route('delete-kategori', $kategori->id) }}">
                            @php
                                $colors = ['primary', 'secondary', 'success', 'warning', 'info', 'dark'];
                                $rand_keys = array_rand($colors, 1);
                            @endphp
                            <span class="badge bg-{{ $colors[$rand_keys] }} text-white">
                                {{ $kategori->nama }}
                                <span style="color:red;">&times;</span>
                            </span>
                        </a>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submitKategori">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
