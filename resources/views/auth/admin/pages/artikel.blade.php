<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#M_S_artikel">
                        &#10010; ARTIKEL
                    </button>
                    {{-- {{ url('/' . request()->segment(1) . '/' . request()->segment(2) . '/table') }} --}}

                    @include('auth.' . request()->segment(1) . '.modals.' . request()->segment(2))

                    <div class="card-text">
                        <table id="table_{{ request()->segment(2) }}" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
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
