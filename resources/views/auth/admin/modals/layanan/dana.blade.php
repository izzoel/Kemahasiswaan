<div class="modal fade" id="M_S_dana" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        Dana <span class="badge bg-primary text-white">Baru</span>
                    </h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <select class="form-select" id="kegiatan" name="kegiatan"></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="dana">Keperluan Dana<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="dana" name="dana" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="berkas">Berkas<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="berkas" name="berkas" required />
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

<div class="modal modalUpdate fade" id="M_U_dana" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="M_F_dana" action="{{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/' . request()->segment(3) . '/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">
                        Organisasi <span class="badge bg-primary text-white">Edit</span>
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
                        <label for="U_kegiatan" class="form-label">Kegiatan</label>
                        <select class="form-select" id="U_kegiatan" name="kegiatan" {{ $disabled }}></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_dana">Keperluan Dana</label>
                        <input type="text" class="form-control" id="U_dana" name="dana" {{ $disabled }} />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="U_berkas">Berkas</label>
                        @if (auth('organisasi')->check())
                            <input type="file" class="form-control" id="U_berkas" name="berkas" />
                        @endif
                        <div id="U_berkas_link" class="{{ $margin }}"></div>
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

<div class="modal modalDelete fade" id="M_D_dana" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_dana">Konfirmasi Hapus</h5>
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
