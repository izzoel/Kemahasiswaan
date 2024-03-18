<div class="x_title">
    <h2>Postingan</h2>
    <ul class="nav navbar-right panel_toolbox" style="min-width: 0px">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="row">
        <table id="postingan" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th class="col-auto">#</th>
                    <th class="col">Judul</th>
                    <th class="col-auto">Kategori</th>
                    <th class="col">Thumbnail</th>
                    <th class="col-auto">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $post->judul }}</td>
<<<<<<< HEAD
                        <td>{{ $post->kategori }}</td>
=======
                        <td>{{ $post->kategori->nama }}</td>
>>>>>>> 740fe1f (add fitur tambah kategori)
                        <td>
                            <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                class="img-responsive center-block d-block mx-auto"
                                style="max-width: 300px; max-height: 300px;">
                        </td>
                        <td>
                            <div class="btn-group mr-2" role="group" aria-label="Denger group">
                                <a href="{{ route('delete-post', $post->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editPost{{ $post->id }}">
                                    Edit
                                </button>


                                <a href="#" class="btn btn-sm btn-success">Lihat</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@include('modals.post')
