<div class="x_title">
    <h2>Pengajuan <span class="badge bg-primary text-white">Dana</span></h2>
    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="dana" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col-auto">Ormawa</th>
                    <th class="col-auto">Rentang Tanggal</th>
                    <th class="col-auto">Nama Kegiatan</th>
                    <th class="col-auto">Keperluan Dana</th>
                    <th class="col-auto">Berkas</th>
                    <th class="col-auto">Status</th>
                    @if (auth()->user()->role != 'admin')
                        <th class="col-auto">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($danas as $dana)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dana->kegiatan->ormawa->nama }}</td>
                        <td>{{ $dana->kegiatan->tanggal }}</td>
                        <td>{{ $dana->kegiatan->nama }}</td>
                        <td>{{ $dana->dana }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $dana->berkas) }}" target="_blank"><i class="fa fa-file"></i>
                                lihat</a>
                        </td>
                        <td>
                            <a type="button" data-toggle="modal"
                                data-target="#editStatus{{ auth()->user()->role === 'admin' ? $dana->id : '' }}">
                                <span
                                    class="badge badge-{{ $dana->status === 'Ditinjau' ? 'warning' : ($dana->status === 'Disetujui' ? 'success' : 'danger') }}">{{ $dana->status }}
                                </span>
                            </a>
                            {{-- <input type="checkbox" class="custom-control-input" id="approved{{ $dana->id }}"
                                name="approved" {{ $dana->status === 'approved' ? 'checked' : '' }}> --}}
                        </td>
                        @if (auth()->user()->role != 'admin')
                            <td>
                                <div class="btn-group mr-2" role="group">
                                    <a href="{{ route('delete-dana', $dana->id) }}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                                <div class="btn-group mr-2" role="group">
                                    <button class="btn btn-sm btn-warning text-dark" data-toggle="modal"
                                        data-target="#edit-dana{{ $dana->id }}">Edit</button>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('modals.modal_dana')
