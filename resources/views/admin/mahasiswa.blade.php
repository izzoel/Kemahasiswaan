<div class="x_title">
    <h2>Data <span class="badge bg-primary text-white">Mahasiswa</span></h2>

    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="mahasiswa" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col-auto">NIM</th>
                    <th class="col-auto">Nama</th>
                    <th class="col-auto">Fakultas</th>
                    <th class="col-auto">Prodi</th>
                    {{-- <th class="col-auto">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->fakultas }}</td>
                        <td>{{ $mahasiswa->prodi }}</td>
                        {{-- <td>
                            <div class="btn-group mr-2" role="group">
                                <a href="{{ route('delete-mahasiswa', $mahasiswa->id) }}"
                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="btn-group mr-2" role="group">
                                <button class="btn btn-sm btn-warning text-dark" data-toggle="modal"
                                    data-target="#edit-mahasiswa{{ $mahasiswa->id }}">Edit</button>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('modals.modal_mahasiswa')
