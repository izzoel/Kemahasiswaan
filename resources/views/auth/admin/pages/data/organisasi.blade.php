<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex gap-2 mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_organisasi">
                            &#10010; ORMAWA
                        </button>
                        <select id="filter_periode" class="form-select w-auto"></select>
                    </div>


                    @include('auth.' . request()->segment(1) . '.modals.' . request()->segment(2) . '.' . request()->segment(3))

                    <div class="card-text">
                        <table id="table_{{ request()->segment(3) }}" class="table table-striped table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Logo</th>
                                    <th>Anggaran</th>
                                    <th>Periode</th>
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
