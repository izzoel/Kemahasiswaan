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
                                <label class="control-label col-md-2 col-sm-2 ">Pengajuan Dana</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input class="form-control rounded" placeholder="..." name="dana" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Surat Pengajuan Dana</label>
                                <div class="input-group mb-3 col-md-10 col-sm-10 ">
                                    <div class="custom-file mb-0 pb-0">
                                        <input type="file" class="custom-file-input" id="surat" name="surat"
                                            onchange="document.getElementById('surat-label').textContent = this.files[0].name"
                                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv,.rtf">
                                        <label class="custom-file-label" id="surat-label" for="surat">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col p-0">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 ">Nama Kegiatan
                                    <a type="button" data-toggle="modal" data-target="#tambahKegiatan">
                                        <span class="badge badge-sm small bg-primary text-white">+</span>
                                    </a>
                                </label>
                                <div class="col-md-10 col-sm-10 ">
                                    <select id="kategori" name="kategori" class="form-control p-2">
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
                                    <input type="text" class="form-control rounded" name="tanggal" disabled />
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

@foreach ($danas as $dana)
    <div class="modal fade" id="edit-dana{{ $dana->id }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1">
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
                                    <label class="control-label col-md-2 col-sm-2 ">Nama dana</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input class="form-control rounded" placeholder="..." name="namaEdit" required
                                            value="{{ $dana->nama }}">
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
                                            value="{{ $dana->tanggal }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col p-0">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 ">Proposal dana</label>
                                    <div class="input-group mb-3 col-md-10 col-sm-10 ">
                                        <a href="{{ asset('storage/' . $dana->berkas) }}" target="_blank"><i
                                                class="fa fa-file"></i> {{ substr($dana->berkas, 9) }}</a>
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

@include('modals.modal_kegiatan')
