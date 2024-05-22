<div class="x_title">
    <h2>Struktur Organisasi <span class="badge bg-primary text-white">{{ strtoupper(auth()->user()->username) }}</span>
    </h2>
    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="strukturOrmawa" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col-5">Nama Lengkap</th>
                    <th class="col-3">Jabatan</th>
                    <th class="col-2">Program Studi</th>
                    <th class="col-auto">Foto Profil</th>
                    <th class="col-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($strukturs as $struktur)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $struktur->mahasiswa }}</td>
                        <td>{{ $struktur->jabatan }}</td>
                        <td>{{ $struktur->prodi }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $struktur->profil) }}"
                                class="img-responsive center-block d-block mx-auto"
                                style="max-width: 150px; max-height: 150px;">
                        </td>
                        <td>
                            <div class="btn-group mr-2" role="group">
                                <a href="{{ route('delete-ormawa', $struktur->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </div>
                            <div class="btn-group mr-2" role="group">
                                <button class="btn btn-sm btn-warning text-dark" data-toggle="modal"
                                    data-target="#edit-ormawa{{ $struktur->id }}">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('modals.modal_struktur')
