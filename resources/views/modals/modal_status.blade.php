<!-- Modal Edit-->
@if (Request::is('*/kegiatan/show'))
    @foreach ($kegiatans as $kegiatan)
        <div class="modal fade" id="statusKegiatan{{ $kegiatan->id }}" data-backdrop="static" data-keyboard="false"
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

                    <form method="POST" action="{{ route('update-kegiatan', $kegiatan->stat->id ?? '') }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Status</label>
                                        <div class="col-md-8 ">
                                            <select id="status{{ $kegiatan->id }}" name="status"
                                                class="form-control p-2"
                                                onchange="
                                                if (this.value === 'Ditinjau') {
                                                    $('#rektor{{ $kegiatan->id }}').show('fast');
                                                    $('#simpan{{ $kegiatan->id }}').hide('fast');
                                                } else if (this.value === 'Disetujui') {
                                                    $('#rektor{{ $kegiatan->id }}').hide('fast');
                                                    $('#simpan{{ $kegiatan->id }}').show('fast');
                                                } else if (this.value === 'Ditolak') {
                                                    $('#rektor{{ $kegiatan->id }}').hide('fast');
                                                    $('#simpan{{ $kegiatan->id }}').show('fast');
                                                }
                                            ">
                                                @foreach (['Ditinjau', 'Disetujui', 'Ditolak'] as $status)
                                                    <option value="{{ $status }}"
                                                        {{ $kegiatan->status == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Keterangan</label>
                                        <div class="col-md-8 ">
                                            <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan">{{ $kegiatan->stat->keterangan ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" id="simpan{{ $kegiatan->id }}" class="btn btn-primary"
                                style="{{ $kegiatan->status == 'Ditinjau' ? 'display : none' : '' }}">Simpan</button>
                            <button type="submit" id="rektor{{ $kegiatan->id }}" class="btn btn-success">Ke
                                Rektor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@elseif(Request::is('*/dana/show'))
    @foreach ($danas as $dana)
        <div class="modal fade" id="statusDana{{ $dana->id }}" data-backdrop="static" data-keyboard="false"
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

                    <form method="POST" action="{{ route('update-dana', $dana->stat->id) }}">
                        @method('PUT')
                        @csrf
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Status</label>
                                        <div class="col-md-8 ">
                                            <select id="status{{ $dana->id }}" name="status"
                                                class="form-control p-2"
                                                onchange="
                                                if (this.value === 'Ditinjau') {
                                                    $('#rektor{{ $dana->id }}').show('fast');
                                                    $('#simpan{{ $dana->id }}').hide('fast');
                                                } else if (this.value === 'Disetujui') {
                                                    $('#rektor{{ $dana->id }}').hide('fast');
                                                    $('#simpan{{ $dana->id }}').show('fast');
                                                } else if (this.value === 'Ditolak') {
                                                    $('#rektor{{ $dana->id }}').hide('fast');
                                                    $('#simpan{{ $dana->id }}').show('fast');
                                                }
                                            ">
                                                @foreach (['Ditinjau', 'Disetujui', 'Ditolak'] as $status)
                                                    <option value="{{ $status }}"
                                                        {{ $dana->status == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col p-0">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 ">Keterangan</label>
                                        <div class="col-md-8 ">
                                            <textarea class="resizable_textarea form-control rounded" placeholder="..." name="keterangan">{{ $dana->stat->keterangan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_dana" value="{{ $dana->id }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" id="simpan{{ $dana->id }}" class="btn btn-primary"
                                style="{{ $dana->status == 'Ditinjau' ? 'display : none' : '' }}">Simpan</button>
                            <button type="submit" id="rektor{{ $dana->id }}" class="btn btn-success">Ke
                                Rektor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif
