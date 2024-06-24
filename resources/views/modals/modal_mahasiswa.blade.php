<!-- Modal Tambah-->
<div class="modal fade" id="tambahMahasiswa" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Mahasiswa <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="container-fluid">
                <div class="row  mt-3 mx-auto">
                    <div class="col-auto form-check">
                        <input class="form-check-input" type="radio" name="input_mahasiswa" id="import_mahasiswa"
                            checked>
                        <label class="form-check-label text-dark" for="import_mahasiswa">
                            Import Excel
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" type="radio" name="input_mahasiswa" id="input_mahasiswa">
                        <label class="form-check-label text-dark" for="input_mahasiswa">
                            Input Mahasiswa
                        </label>
                    </div>
                </div>
            </div>

            <form id="form_import" method="POST" action="{{ route('import-mahasiswa') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 ">Excel</label>
                                <div class="input-group mb-3 col-md-11 col-sm-11 ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="excel" name="excel"
                                            onchange="document.getElementById('excel-label').textContent = this.files[0].name"
                                            accept=".xlsx, .xls, .csv">
                                        <label class="custom-file-label" id="excel-label" for="excel">Choose
                                            file</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col p-0">
                            <div class="ml-2">
                                <a href="{{ asset('[WEB] [KEMAHASISWAAN] Mahasiswa UNBL.xlsx') }}"
                                    style="color:#007bff;text-decoration:none" onmouseover="this.style.color='#0056b3'"
                                    onmouseout="this.style.color='#007bff'"><strong>[Template Import
                                        Mahasiswa.xlsx]</strong></a>
                                <br>
                                <i>jika data sudah ada maka akan di update.</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>

            <form id="form_submit" method="POST" action="{{ route('store-mahasiswa') }}" style="display: none">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">NIM</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." name="nim" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input class="form-control rounded" placeholder="..." name="nama" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Fakultas</label>
                                <div class="col-md-8 ">
                                    <select id="fakultas" name="fakultas" class="form-control p-2" required>
                                        <option value="" {{ old('fakultas') == null ? 'selected' : '' }} disabled>
                                            --Pilih--
                                        </option>
                                        @foreach (['Farmasi', 'Ilmu Kesehatan Dan Sains Teknologi', 'Ilmu Sosial Dan Humaniora'] as $fakultas)
                                            <option value="{{ $fakultas }}"
                                                {{ $fakultas == old('fakultas') ? 'selected' : '' }}>
                                                {{ $fakultas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Program Studi</label>
                                <div class="col-md-8 ">
                                    <select id="prodi" name="prodi" class="form-control p-2" required>
                                        <option value="" {{ old('prodi') == null ? 'selected' : '' }} disabled>
                                            --Pilih--
                                        </option>
                                    </select>
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

{{-- @foreach ($prokers as $proker)
    <div class="modal fade" id="edit-proker{{ $proker->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
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

                <form method="POST" action="{{ route('update-proker', $proker->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Program Kerja</label>
                                    <div class="col-md-8">
                                        <input class="form-control rounded" placeholder="..." name="namaEdit" required
                                            value="{{ $proker->nama }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Tanggal Pelaksanaan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control rounded" name="tanggalEdit"
                                            value="{{ $proker->tanggal }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Anggaran</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control rounded" name="anggaranEdit"
                                            placeholder="..." value="{{ $proker->anggaran }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-4 ">Keterangan</label>
                                    <div class="col-md-8 ">
                                        <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keteranganEdit"
                                            value="{{ $proker->keterangan }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
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
