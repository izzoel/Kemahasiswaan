<!-- Modal Tambah-->
<div class="modal fade" id="tambahStrukturOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Anggota <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-struktur') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Mahasiswa</label>
                                <div class="col-md-8">
                                    <select id="struktur_ormawa" name="mahasiswa" class="form-control rounded" style="width: 100%;min-width: 100%;" required>
                                        <option></option>
                                    </select>
                                    {{-- <select id="nama" name="mahasiswa" required style="width: 100%;min-width: 100%;"></select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Jabatan</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." id="jabatan" name="jabatan" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Program Studi</label>
                                <div class="col-md-8 ">
                                    <select id="prodi" name="prodi" class="form-control p-2">
                                        @foreach (['D3 Farmasi', 'D3 TLM', 'S1 Farmasi', 'S1 ARS', 'S1 Gizi', 'S1 Manajemen', 'S1 Hukum', 'S1 PGSD'] as $prodi)
                                            <option value="{{ $prodi }}" {{ $prodi == old('prodi') ? 'selected' : '' }}>{{ $prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Foto Profil</label>

                                <div class="input-group mb-3 col-md-8 ">
                                    <div class="input-group">
                                        <input type="file" class="form-control-file" id="profil" name="profil" accept="image/*">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- 
@foreach ($strukturs as $struktur)
    <div class="modal fade" id="edit-ormawa{{ $struktur->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Anggota <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-struktur', $struktur->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Nama Lengkap</label>
                                    <div class="col-md-8">
                                        <select id="struktur_ormawa" name="mahasiswaEdit" class="form-control rounded" style="width: 100%;min-width: 100%;" required>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Jabatan</label>
                                    <div class="col-md-8">
                                        <input class="form-control rounded" placeholder="..." name="jabatanEdit" required value="{{ $struktur->jabatan }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Program Studi</label>
                                    <div class="col-md-8">
                                        <select name="prodiEdit" class="form-control p-2">
                                            @foreach (['D3 Farmasi', 'D3 TLM', 'S1 Farmasi', 'S1 ARS', 'S1 Gizi', 'S1 Manajemen', 'S1 Hukum', 'S1 PGSD'] as $prodi)
                                                <option value="{{ $prodi }}" {{ $prodi == $struktur->prodi ? 'selected' : '' }}>
                                                    {{ $prodi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Foto Profil</label>
                                    <div class="input-group mb-3 col-md-8">
                                        <div class="input-group">
                                            <img src="{{ asset('storage/' . $struktur->profil) }}" class="img-responsive center-block d-block mx-auto"
                                                style="max-width: 150px; max-height: 150px;">
                                            <div class="custom-file">
                                                <input type="file" class="form-control-file" id="profil" name="profilEdit" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="profil" value="{{ $struktur->profil }}">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach --}}
