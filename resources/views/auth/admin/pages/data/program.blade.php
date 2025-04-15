<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#M_S_program">
                        &#10010; PROGRAM
                    </button>

                    <button type="button" class="btn btn-outline-primary mb-3 btnAnggaran">
                        <span class="text-dark">Anggaran :</span>
                    </button>



                    @include('auth.' . request()->segment(1) . '.modals.' . request()->segment(2) . '.' . request()->segment(3))

                    <div class="card-text">
                        <table id="table_{{ request()->segment(3) }}" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program Kerja</th>
                                    <th>Pelaksanaan</th>
                                    <th>Anggaran</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
