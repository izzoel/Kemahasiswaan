<div class="x_title">
    <h2 class="d-inline-block mr-3">Data Program Kerja <span class="badge bg-primary text-white">Ormawa</span></h2>
    @if (auth()->user()->role == 'ormawa')
        <h2 class="d-inline-block mr-2">Anggaran <span class="badge bg-primary text-white">{{ $anggaran }}</span></h2>
    @endif

    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="proker" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    @if (auth()->user()->role == 'admin')
                        <th class="col-auto">Ormawa</th>
                    @endif
                    <th class="col-5">Program Kerja</th>
                    <th class="col-auto">Waktu Pelaksanaan</th>
                    <th class="col-auto">Anggaran</th>
                    <th class="col-auto">Keterangan</th>
                    <th class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prokers as $proker)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (auth()->user()->role == 'admin')
                            <td>{{ $proker->ormawa->nama }}</td>
                        @endif
                        <td>{{ $proker->nama }}</td>
                        <td>{{ $proker->tanggal }}</td>
                        <td>{{ $proker->anggaran }}</td>
                        <td>{{ $proker->keterangan ?? '-' }}</td>
                        <td>
                            <div class="btn-group mr-2" role="group">
                                <a href="{{ route('delete-proker', $proker->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </div>
                            <div class="btn-group mr-2" role="group">
                                <button class="btn btn-sm btn-warning text-dark" data-toggle="modal"
                                    data-target="#edit-proker{{ $proker->id }}">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('modals.modal_proker')
