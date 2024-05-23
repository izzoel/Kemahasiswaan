<!-- Modal Tambah-->
<div class="modal fade" id="tambahKegiatan" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Pengajuan <span class="badge bg-primary text-white">Kegiatan</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-kegiatan') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">


                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Rentang Tanggal</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control rounded" name="tanggal"
                                        placeholder="..." />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Nama Kegiatan</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input class="form-control rounded" placeholder="..." name="nama" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Anggaran</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control rounded" name="anggaran" id="anggaran"
                                        placeholder="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Proposal Kegiatan</label>
                                <div class="input-group mb-3 col-md-10 col-sm-10 ">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="berkas" name="berkas"
                                            onchange="document.getElementById('berkas-label').textContent = this.files[0].name"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf">
                                        <label class="custom-file-label" id="berkas-label" for="berkas">Choose
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
                <input type="hidden" name="id_ormawa" value="{{ auth()->user()->id }}">
                <input type="hidden" name="status" id="status" value="verifikasi">

            </form>
        </div>
    </div>
</div>

@foreach ($kegiatans as $kegiatan)
    <div class="modal fade" id="edit-kegiatan{{ $kegiatan->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>kegiatan <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-kegiatan', $kegiatan->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Nama Kegiatan</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input class="form-control rounded" placeholder="..." name="namaEdit"
                                            required value="{{ $kegiatan->nama }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Rentang Tanggal</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control rounded" name="tanggalEdit"
                                            value="{{ $kegiatan->tanggal }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Proposal Kegiatan</label>
                                    <div class="input-group mb-3 col-md-10 col-sm-10 ">
                                        <a href="{{ asset('storage/' . $kegiatan->berkas) }}" target="_blank"><i
                                                class="fa fa-file"></i> {{ substr($kegiatan->berkas, 9) }}</a>
                                        <div class="input-group">

                                            <div class="custom-file">
                                                <input type="file" class="form-control-file" id="berkas"
                                                    name="berkasEdit"
                                                    accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="tanggal" value="{{ $kegiatan->tanggal }}">
                    <input type="hidden" name="berkas" value="{{ $kegiatan->berkas }}">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


@foreach ($kegiatans as $kegiatan)
    <div class="modal fade" id="status{{ $kegiatan->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>Edit <span class="badge bg-warning text-dark">Status</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-4 ">Keterangan</label>
                                <div class="col-md-8 ">
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan" disabled>{{ $kegiatan->stat->keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
