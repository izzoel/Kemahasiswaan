<div class="modal fade" id="M_S_beasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Beasiswa <span class="badge bg-primary text-white p-2 rounded-1" style="background-color: #1b36f7 !important;font-size: 17px">Mahasiswa</span>
                </h5>
                <a href="" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="me-4 mb-4 text-center" data-aos="fade-right" data-aos-duration="1500">
                            <h2>Raih Beasiswamu Disini!</h2>
                        </div>
                        <div class="col-md-6">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#nav-akademik">
                                        Akademik
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-nonakademik">
                                        Non Akademik
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-akademik" role="tabpanel">
                                    <div class="card m-4 bg-light">
                                        <div class="card-body">
                                            <form id="BeasiswaAkademik" action="{{ url('beasiswa/akademik/store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="control-label">Nama Lengkap<span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select id="B_A_nama" name="nama" required></select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="control-label" for="B_A_ips">Indeks Prestasi Semester<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control  mb-1" id="B_A_ips" name="ips" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="B_A_surat">Surat Pengajuan Beasiswa Akademik (docx/doc/pdf)<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" id="B_A_surat" name="surat" required accept=".docx,.doc,.pdf" />
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary mt-3 px-4 py-0 rounded-1">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-nonakademik" role="tabpanel">
                                    <div class="card m-4 bg-light">
                                        <div class="card-body">
                                            <form id="BeasiswaNonakademik" action="{{ url('beasiswa/nonakademik/store') }}" method="POST">
                                                @csrf

                                                <div class="mb-3">
                                                    <label class="control-label">Nama Lengkap<span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select id="B_NA_nama" name="nama" required></select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="control-label">Prestasi<span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select id="B_NA_prestasi" name="prestasi" required></select>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary mt-5 px-4 py-0 rounded-1">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6" data-aos="fade-left" data-aos-duration="1500">
                            <div class="d-flex align-items-center m-2 mt-4">
                                <img src="{{ asset('img/beasiswa.svg') }}" class="img-fluid" alt="img" style="max-width: 100%; margin-left: auto;" data-aos="zoom-in"
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
