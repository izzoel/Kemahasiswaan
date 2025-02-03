<div class="x_title">
    <h2>Pengajuan <span class="badge bg-primary text-white">Kegiatan</span></h2>
    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="kegiatan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col-auto">Ormawa</th>
                    <th class="col-auto">Rentang Tanggal</th>
                    <th class="col-auto">Nama Kegiatan</th>
                    <th class="col-auto">Jumlah Anggaran</th>
                    <th class="col-auto">Proposal Kegiatan</th>
                    <th class="col-auto">Status</th>
                    @if (auth()->user()->role != 'admin')
                        <th class="col-1">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kegiatan->ormawa->nama }}</td>
                        <td>{{ $kegiatan->tanggal }}</td>
                        <td>{{ $kegiatan->nama }}</td>
                        <td>{{ $kegiatan->anggaran }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $kegiatan->berkas) }}" target="_blank"><i class="fa fa-file"></i> lihat </a>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal"
                                data-target="#{{ auth()->user()->role === 'admin' ? 'statusKegiatan' . $kegiatan->id : 'status' . $kegiatan->id }}">
                                <span
                                    class="badge badge-{{ $kegiatan->status === 'Ditinjau' ? 'warning' : ($kegiatan->status === 'Disetujui' ? 'success' : 'danger') }}">{{ $kegiatan->status }}
                                </span>
                            </a>
                        </td>
                        @if (auth()->user()->role != 'admin')
                            <td>
                                <div class="btn-group mr-2" role="group">
                                    <button href="{{ route('delete-kegiatan', $kegiatan->id) }}" class="btn btn-sm btn-danger"
                                        {{ $kegiatan->status === 'Disetujui' || $kegiatan->status === 'Ditinjau' ? 'disabled' : '' }}><i class="fa fa-trash"></i></button>
                                </div>
                                <div class="btn-group mr-2" role="group">
                                    <button class="btn btn-sm btn-warning text-dark" data-toggle="modal" data-target="#edit-kegiatan{{ $kegiatan->id }}"
                                        {{ $kegiatan->status === 'Disetujui' || $kegiatan->status === 'Ditinjau' ? 'disabled' : '' }}>Edit</button>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('modals.modal_kegiatan')
@include('modals.modal_status')
