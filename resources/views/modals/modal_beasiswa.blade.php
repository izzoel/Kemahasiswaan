<!-- Modal Jenis Beasiswa-->
<div class="modal fade" id="jenisBeasiswaModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title">
                    <h2>Daftar <span class="badge bg-primary text-white">Beasiswa</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="row justify-content-md-center mt-2 mb-5">
                <div class="col d-grid justify-content-md-end mt-4 me-2 ms-2" data-aos="fade-right" data-aos-duration="1500">
                    <div class="card mx-auto" style="width: 20rem;">
                        <div class="mx-auto d-block mt-3 position-relative text-center card-img-top">
                            <img src="{{ asset('images/beasiswa-akademik.png') }}" alt="beasiswa-akademik" width="200">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Akademik</h5>
                            <p class="card-text">Form pengajuan beasiswa jenis <b style="color: #007bff;">Akademik</b> Universitas Borneo Lestari.
                            </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-toggle="modal" data-target="#akademikModal">
                                <a class="btn btn-primary d-md-flex justify-content-md-end text-center text-light rounded" role="button">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col d-grid justify-content-md-start mt-4 me-2 ms-2" data-aos="fade-left" data-aos-duration="1500">
                    <div class="card mx-auto" style="width: 20rem;">
                        <div class="mx-auto d-block mt-3 position-relative text-center card-img-top">
                            <img src="{{ asset('images/beasiswa-nonakademik.png') }}" alt="beasiswa-nonakademik" width="200">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Non Akademik</h5>
                            <p class="card-text">Form pengajuan beasiswa jenis <b style="color: #007bff;">Non akademik</b> Universitas Borneo Lestari.
                            </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-toggle="modal" data-target="#nonkademikModal">
                                <a class="btn btn-primary d-md-flex justify-content-md-end text-center text-light rounded" role="button">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Beasiswa Nonakademik-->
<div class="modal fade" id="nonkademikModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title">
                    <h2>Beasiswa <span class="badge bg-primary text-white">Akademik</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-nonakademik') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <select id="nama_beasiswa_nonakademik" name="nama" class="form-control rounded" style="width: 100%;min-width: 100%;">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4">Prestasi</label>
                                <div class="col-md-8">
                                    <select id="prestasi" name="prestasi" class="form-control rounded" style="width: 100%;min-width: 100%;"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('scripts/script_beasiswa')
