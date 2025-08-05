<div class="modal fade" id="M_S_prestasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Prestasi <span class="badge bg-primary text-white p-2 rounded-1" style="background-color: #1b36f7 !important;font-size: 17px">Mahasiswa</span>
                </h5>
                <a href="" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="me-4 mt-4 text-center" data-aos="fade-right" data-aos-duration="1500">
                            <h2>Daftarkan Prestasimu Disini!</h2>
                        </div>
                        <div class=" col-md-6" data-aos="fade-left" data-aos-duration="1500">
                            <div class="card m-4 bg-light">
                                <div class="card-body">
                                    <form class="text-start" action="{{ url('prestasi/mahasiswa/store') }}" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="control-label">Nama Lengkap<span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <select id="P_nama" name="nama[]" multiple="multiple" required></select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-1">
                                                <label for="P_tahun" class="form-label">Tahun Prestasi<span class="text-danger">*</span></label>
                                                <input type="text" id="P_tahun" name="tahun" class="form-control mb-1" placeholder="Pilih Tahun" style="cursor: default;"
                                                    required>
                                            </div>
                                            <div class="col-md-6 mb-1">
                                                <label for="P_jenis" class="form-label">Jenis Prestasi<span class="text-danger">*</span></label>
                                                <select class="form-select" id="P_jenis" name="jenis" required>
                                                    <option selected>-- Pilih --</option>
                                                    <option value="olahraga">Olahraga</option>
                                                    <option value="sains">Sains</option>
                                                    <option value="seni">Seni</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="P_prestasi" class="form-label">Nama Prestasi<span class="text-danger">*</span></label>
                                            <textarea class="form-control mb-1" id="P_prestasi" name="prestasi" required></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="P_tingkat" class="form-label">Tingkat Prestasi<span class="text-danger">*</span></label>
                                                <select class="form-select mb-1" id="P_tingkat" name="tingkat" required>
                                                    <option selected>-- Pilih --</option>
                                                    <option value="lokal">Lokal</option>
                                                    <option value="regional">Regional</option>
                                                    <option value="nasional">Nasional</option>
                                                    <option value="internasional">Internasional</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="P_raihan" class="form-label">Raihan Prestasi<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control  mb-1" id="P_raihan" name="raihan" placeholder="Juara 1" required>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="form-label" for="P_sertifikat">Sertifikat<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control mb-1" id="P_sertifikat" name="sertifikat" required accept=".png,.jpg,.jpeg,.pdf">
                                            <div id="P_sertifikat_link"></div>
                                        </div>

                                        <div>
                                            <label class="form-label" for="P_dokumentasi">Dokumentasi<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control mb-1" id="P_dokumentasi" name="dokumentasi" required accept=".png,.jpg,.jpeg,.pdf">
                                            <div id="P_dokumentasi_link"></div>
                                        </div>

                                        <div>
                                            <label class="form-label" for="P_foto">Foto<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="P_foto" name="foto" required accept=".png,.jpg,.jpeg,.pdf">
                                            <div id="P_foto_link"></div>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="text-capitalize btn btn-primary px-4 py-0 rounded-1">
                                                Kirim
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center m-2 mt-4">
                                <img src="{{ asset('img/prestasi.svg') }}" class="img-fluid" alt="img" style="max-width: 100%; margin-left: auto;" data-aos="zoom-in"
                                    data-aos-duration="700">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="text-capitalize btn btn-outline-primary px-4 py-0 rounded-1" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
