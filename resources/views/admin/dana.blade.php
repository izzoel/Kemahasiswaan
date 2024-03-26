<div class="x_title">
    <h2>Pengajuan <span class="badge bg-primary text-white">Kegiatan</span></h2>
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
                    <th class="col-auto">Pengajuan Dana</th>
                    <th class="col-auto">Surat Pengajuan Dana</th>
                    <th class="col">Nama Kegiatan</th>
                    <th class="col-auto">Rentang Tanggal</th>
                    <th class="col-auto">Status</th>
                    <th class="col-auto">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danas as $dana)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dana->jumlah }}</td>
                        <td>{{ $dana->surat }}</td>
                        <td>{{ $dana->nama }}</td>
                        <td>{{ $dana->tanggal }}</td>
                        <td>
                            <div class="custom-control custom-switch mt-0 pt-0">
                                <input type="checkbox" class="custom-control-input" id="status">
                                <label class="custom-control-label text-dark" for="status"
                                    style="padding-top: 0.2px ">Approve</label>
                            </div>
                        </td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('modals.modal_dana')
