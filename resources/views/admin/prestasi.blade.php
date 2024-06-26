<div class="x_title">
    <h2>Data <span class="badge bg-primary text-white">Prestasi</span></h2>

    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="prestasi" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col-auto">Nama</th>
                    <th class="col-auto">Lomba</th>
                    <th class="col-auto">Tahun</th>
                    <th class="col-auto">Prestasi</th>
                    <th class="col-auto">Sertifikat</th>
                    <th class="col-auto">Dokumentasi</th>
                    <th class="col-auto">Foto</th>
                    {{-- <th class="col-auto">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($prestasis as $prestasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prestasi->nama }}</td>
                        <td>{{ $prestasi->lomba }}</td>
                        <td>{{ $prestasi->tahun }}</td>
                        <td>{{ $prestasi->prestasi }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $prestasi->sertifikat) }}" target="_blank"><i
                                    class="fa fa-file"></i> lihat </a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $prestasi->dokumentasi) }}" target="_blank"><i
                                    class="fa fa-file"></i> lihat </a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $prestasi->foto) }}" target="_blank"><i
                                    class="fa fa-file"></i> lihat </a>
                        </td>
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
