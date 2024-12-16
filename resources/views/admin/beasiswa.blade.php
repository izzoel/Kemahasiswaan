@if ($jenis == 'Akademik')

    <div class="x_title">
        <h2>Beasiswa <span class="badge bg-primary text-white">Akademik</span></h2>

        <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <table id="beasiswaAkademik" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="col-auto">#</th>
                        <th class="col-auto">Nama</th>
                        <th class="col-auto">NIM</th>
                        <th class="col-auto">Prodi</th>
                        <th class="col-auto">Semester</th>
                        <th class="col-auto">Tahun Akademik</th>
                        <th class="col-auto">Indek Prestasi Semester</th>
                        <th class="col-auto">Prestasi Akademik</th>
                        <th class="col-auto">Surat Keterangan Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beasiswas as $beasiswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $beasiswa->nama }}</td>
                            <td>{{ $beasiswa->nim }}</td>
                            <td>{{ $beasiswa->prodi }}</td>
                            <td>{{ $beasiswa->semester }}</td>
                            <td>{{ $beasiswa->tahun }}</td>
                            <td>{{ $beasiswa->ips }}</td>
                            <td>{{ $beasiswa->terbaik }}</td>

                            <td>
                                <a href="{{ asset('storage/' . $beasiswa->surat) }}" target="_blank"><i class="fa fa-file"></i> lihat </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@elseif ($jenis == 'Non Akademik')
    <div class="x_title">
        <h2>Beasiswa <span class="badge bg-primary text-white">Non Akademik</span></h2>

        <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <table id="beasiswaNonakademik" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="col-auto">#</th>
                        <th class="col-auto">Nama</th>
                        <th class="col-auto">Jenis Beasiswa</th>
                        <th class="col-auto">Lomba</th>
                        <th class="col-auto">Tahun</th>
                        <th class="col-auto">Prestasi</th>
                        <th class="col-auto">Sertifikat</th>
                        <th class="col-auto">Dokumentasi</th>
                        <th class="col-auto">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beasiswas as $beasiswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $beasiswa->nama }}</td>
                            <td>{{ $beasiswa->jenis }}</td>
                            <td>{{ $beasiswa->lomba }}</td>
                            <td>{{ $beasiswa->tahun }}</td>
                            <td>{{ $beasiswa->prestasi }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $beasiswa->sertifikat) }}" target="_blank"><i class="fa fa-file"></i> lihat </a>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $beasiswa->dokumentasi) }}" target="_blank"><i class="fa fa-file"></i> lihat </a>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $beasiswa->foto) }}" target="_blank"><i class="fa fa-file"></i> lihat </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endif

@include('modals.modal_mahasiswa')
@include('modals.modal_beasiswa')
