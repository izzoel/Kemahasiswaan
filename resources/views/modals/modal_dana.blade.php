<!-- Modal Tambah-->
<div class="modal fade" id="tambahDana" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog" style="min-width: 95%">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Pengajuan <span class="badge bg-primary text-white">Dana</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('store-dana') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Nama Kegiatan
                                    <a type="button" data-toggle="modal" data-target="#tambahKegiatan">
                                        <span class="badge badge-sm small bg-primary text-white">+</span>
                                    </a>
                                </label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select id="id_kegiatan" name="id_kegiatan" class="form-control p-2" required>
                                        <option value="0" disabled selected> -- Pilih -- </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2">Rentang Tanggal</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" class="form-control rounded" name="tanggal_kegiatan" id="tanggal_kegiatan" placeholder="..." disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Pengajuan Dana</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input class="form-control rounded" placeholder="..." name="dana" id="dana_kegiatan" required disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Berkas Pengajuan Dana</label>
                                <div class="input-group mb-3 col-md-10 col-sm-10">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="berkas" name="berkas"
                                            onchange="document.getElementById('berkas-label').textContent = this.files[0].name"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf" required>
                                        <label class="custom-file-label" id="berkas-label" for="berkas">Choose
                                            file</label>
                                    </div>
                                    <small id="berkasHelp" class="form-text text-muted col-12">
                                        Jadikan <a href="https://www.ilovepdf.com/merge_pdf" target="_blank"><span class="text-primary"><b>satu file</b></span></a>
                                        <span style="color:red">Surat Pengajuan Dana</span> dan <span style="color:red">TOR</span> dan atau <span style="color:red">Lampiran
                                            lainnya</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                <input type="hidden" name="id_ormawa" id="id_ormawa">
                <input type="hidden" name="tanggal" id="tanggal">
                <input type="hidden" name="dana" id="d_dana">
                <input type="hidden" name="status" id="status" value="Ditinjau">

            </form>
        </div>
    </div>
</div>

@foreach ($danas as $dana)
    <div class="modal fade" id="edit-dana{{ $dana->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog" style="min-width: 95%">
            <div class="modal-content">
                <div class="modal-header pb-1">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <h2>dana <span class="badge bg-warning text-dark">Edit</span></h2>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('update-dana', $dana->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Nama Kegiatan
                                    </label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input class="form-control rounded" value="{{ $dana->kegiatan->nama }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Rentang Tanggal</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control rounded" name="tanggalEdit" value="{{ $dana->tanggal }}" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Pengajuan Dana</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input class="form-control rounded" placeholder="..." id="danaEdit" name="danaEdit" required value="{{ $dana->dana }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Proposal dana</label>
                                    <div class="input-group mb-3 col-md-10 col-sm-10 ">
                                        <a href="{{ asset('storage/' . $dana->berkas) }}" target="_blank"><i class="fa fa-file"></i> {{ substr($dana->berkas, 9) }}</a>
                                        <div class="input-group">

                                            <div class="custom-file">
                                                <input type="file" class="form-control-file" id="berkas" name="berkasEdit"
                                                    accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="tanggal" value="{{ $dana->tanggal }}">
                    <input type="hidden" name="berkas" value="{{ $dana->berkas }}">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


@foreach ($danas as $dana)
    <div class="modal fade" id="status{{ $dana->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
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
                                    <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan" disabled>{{ $dana->stat->keterangan }}</textarea>
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

@include('modals.modal_kegiatan')
