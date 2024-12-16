<!-- Modal Tambah Beasiswa Akademik-->
<div class="modal fade" id="tambahAkademik" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Tambah Beasiswa <span class="badge bg-primary text-white">Akademik</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-akademik') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <select id="nama" name="nama" class="form-control rounded" style="width: 100%;min-width: 100%;" required>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Prodi</label>
                                <div class="col-md-8">
                                    @php
                                        if (auth()->user()->username === 'sfar') {
                                            $prd = 'S1 Farmasi';
                                        } elseif (auth()->user()->username === 'dfar') {
                                            $prd = 'D3 Farmasi';
                                        } elseif (auth()->user()->username === 'ars') {
                                            $prd = 'Administrasi Rumah Sakit';
                                        } elseif (auth()->user()->username === 'dak') {
                                            $prd = 'D3 Analis Kesehatan';
                                        } elseif (auth()->user()->username === 'gz') {
                                            $prd = 'S1 Gizi';
                                        } elseif (auth()->user()->username === 'apt') {
                                            $prd = 'Apoteker';
                                        } elseif (auth()->user()->username === 'mnj') {
                                            $prd = 'S1 Manajemen';
                                        } elseif (auth()->user()->username === 'hkm') {
                                            $prd = 'S1 Hukum';
                                        } elseif (auth()->user()->username === 'pgsd') {
                                            $prd = 'S1 PGSD';
                                        }
                                    @endphp

                                    <input id="prodi" name="prodi" type="text" value="{{ $prd }}" class="form-control rounded"
                                        style="width: 100%; min-width: 100%;" disabled required>
                                    </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Semester</label>
                                <div class="col-md-8">
                                    <input id="semester" name="semester" type="number" class="form-control rounded" maxlength="2" placeholder="..."
                                        style="width: 100%;min-width: 100%;" required>
                                    </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Tahun Akademik</label>
                                <div class="col-md-8">
                                    <input id="tahun" name="tahun" class="form-control rounded" style="width: 100%;min-width: 100%;" required>
                                    </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Indek Prestasi Semester</label>
                                <div class="col-md-8">
                                    <input id="ips" name="ips" type="text" class="form-control rounded" maxlength="4" placeholder="..."
                                        style="width: 100%;min-width: 100%;" required>
                                    </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Prestasi Akademik</label>
                                <div class="col-md-8">
                                    <select id="terbaik" name="terbaik" type="text" class="form-control rounded" style="width: 100%;min-width: 100%;" required>
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Terbaik 1">Terbaik Ke 1</option>
                                        <option value="Terbaik 2">Terbaik Ke 2</option>
                                        <option value="Terbaik 3">Terbaik Ke 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 ">Surat Keterangan Prestasi</label>
                                <div class="input-group mb-3 col-md-8 col-sm-8 ">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="surat" name="surat"
                                            onchange="document.getElementById('surat-label').textContent = this.files[0].name"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf" required>
                                        <label class="custom-file-label" id="surat-label" for="surat">Choose
                                            file</label>
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
