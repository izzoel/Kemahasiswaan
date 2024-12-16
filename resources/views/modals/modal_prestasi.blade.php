<!-- Modal Tambah-->
<div class="modal fade" id="tambahPrestasi" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Daftar <span class="badge bg-primary text-white">Prestasi</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formPrestasi" method="POST" action="{{ route('store-prestasi') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <select id="nama" name="nama[]" multiple="multiple" style="width: 100%;min-width: 100%;"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Tahun Prestasi</label>
                                <div class="col-md-8">
                                    <input class="datepicker form-control rounded" name="tahun" placeholder="..." style="margin-bottom: .9em" pattern="\d{4}" maxlength="4"
                                        required>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Prestasi</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control rounded" name="lomba" placeholder="..." style="margin-bottom: .9em" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Jenis Prestasi</label>
                                <div class="col-md-8">
                                    <select id="jenis" name="jenis" style="width: 100%;min-width: 100%;" required>
                                        <option value="Olahraga">Olahraga</option>
                                        <option value="Sains">Sains</option>
                                        <option value="Seni">Seni</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Tingkat Prestasi</label>
                                <div class="col-md-8">
                                    <select id="tingkat" name="tingkat" style="width: 100%;min-width: 100%;" required>
                                        <option value="Lokal">Lokal</option>
                                        <option value="Regional">Regional</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Internasional">Internasional</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Raihan Prestasi</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control rounded" name="prestasi" placeholder="..." style="margin-bottom: 1em" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 ">File Sertifikat</label>
                                <div class="input-group mb-3 col-md-8 col-sm-8 ">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="sertifikat" name="sertifikat"
                                            onchange="document.getElementById('sertifikat-label').textContent = this.files[0].name"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf" required>
                                        <label class="custom-file-label" id="sertifikat-label" for="sertifikat">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 ">File Dokumentasi</label>
                                <div class="input-group mb-3 col-md-8 col-sm-8 ">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="dokumentasi" name="dokumentasi"
                                            onchange="document.getElementById('dokumentasi-label').textContent = this.files[0].name"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf" required>
                                        <label class="custom-file-label" id="dokumentasi-label" for="dokumentasi">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 ">File Foto</label>
                                <div class="input-group mb-3 col-md-8 col-sm-8 ">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="foto" name="foto"
                                            onchange="document.getElementById('foto-label').textContent = this.files[0].name" accept="image/*" required>
                                        <label class="custom-file-label" id="foto-label" for="foto">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button id="simpanPrestasi" type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>




@include('scripts/script_prestasi')
