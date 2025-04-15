<div class="modal fade" id="M_S_konseling" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Layanan <span class="badge bg-primary text-white p-2 rounded-1" style="background-color: #1b36f7 !important;font-size: 17px">Konseling</span>
                </h5>
                <a href="" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="me-4 mt-4 text-center" data-aos="fade-right" data-aos-duration="1500">
                            <h2>Layanan Konseling Mahasiswa</h2>
                        </div>
                        <div class=" col-md-6" data-aos="fade-left" data-aos-duration="1500">
                            <div class="card mt-0 m-4 bg-light">
                                <div class="card-body">
                                    <form class="text-start" action="{{ url('konseling/mahasiswa/store') }}" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="control-label">Nama Lengkap<span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <select id="K_nama" name="nama" required></select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="K_tanggal" class="form-label">Jadwal Konseling<span class="text-danger">*</span></label>
                                            <input type="text" id="K_tanggal" name="tanggal" class="form-control mb-1" placeholder="Pilih Tanggal" style="cursor: default;"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="K_hp" class="form-label">Kontak yang dapat dihubungi (Whatsapp)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control  mb-1" id="K_hp" name="hp" required>
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
                                <img src="{{ asset('img/konseling.svg') }}" class="img-fluid" alt="img" style="max-width: 100%; margin-left: auto;" data-aos="zoom-in"
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
