<div class="x_title">
    <h2>Data <span class="badge bg-primary text-white">Ormawa</span></h2>
    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="ormawa" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col-auto">Nama Organisasi</th>
                    <th class="col-auto">Logo</th>
                    <th class="col">Keterangan</th>
                    <th class="col-auto">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ormawas as $ormawa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ormawa->nama }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $ormawa->logo) }}"
                                class="img-responsive center-block d-block mx-auto"
                                style="max-width: 150px; max-height: 150px;">
                        </td>
                        <td>{{ $ormawa->keterangan }}</td>
                        <td>
                            <div class="btn-group mr-2" role="group">
                                <a href="{{ route('delete-ormawa', $ormawa->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </div>
                            <div class="btn-group mr-2" role="group">
                                <button class="btn btn-sm btn-warning text-dark" data-toggle="modal"
                                    data-target="#edit-ormawa{{ $ormawa->id }}">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('modals.modal_ormawa')
