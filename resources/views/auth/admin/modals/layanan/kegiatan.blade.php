<div class="modal fade" id="M_S_kegiatan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Kegiatan <span class="badge bg-primary text-white">Baru</span>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="kegiatan">Kegiatan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="pelaksanaan">Pelaksanaan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="pelaksanaan" name="pelaksanaan" required style="cursor: default;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="anggaran">Anggaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="anggaran" name="anggaran" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="proposal">Proposal<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="proposal" name="proposal" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modalUpdate fade" id="M_U_kegiatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_kegiatan" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        Kegiatan <span class="badge bg-primary text-white">Edit</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (auth()->check())
                        @php
                            $disabled = 'disabled';
                            $margin = 'mt-0';
                        @endphp
                    @elseif (auth('organisasi')->check())
                        @php
                            $disabled = '';
                            $margin = 'mt-2';
                        @endphp
                    @endif
                    <div class="mb-3">
                        <label class="form-label" for="U_kegiatan">Kegiatan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_kegiatan" name="kegiatan" {{ $disabled }} />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_pelaksanaan">Pelaksanaan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_pelaksanaan" name="pelaksanaan" {{ $disabled }} style="cursor: default;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_anggaran">Anggaran<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="U_anggaran" name="anggaran" {{ $disabled }} />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_proposal">Proposal<span class="text-danger">*</span></label>
                        @if (auth('organisasi')->check())
                            <input type="file" class="form-control" id="U_proposal" name="proposal" />
                        @endif
                        <div id="U_proposal_link" class="{{ $margin }}"></div>
                    </div>
                    @if (auth()->check())
                        <div class="divider mt-4 mb-0">
                            <div class="divider-text">Status</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="U_status">Status</label>
                            <select class="form-select" name="status">
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modalDelete fade" id="M_D_kegiatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_kegiatan">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-center">
                        Yakin ingin <span class="text-danger">menghapus</span> data?
                    </h4>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="D_route" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
