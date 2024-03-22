{{-- make modal kategori baru --}}
<div class="modal fade" id="tambahKategori" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-1">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <h2>Kategori <span class="badge bg-primary text-white">Baru</span></h2>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" id="kategoriForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" class="form-control rounded" id="kategori-store" name="kategori-store"
                            required>
                    </div>

                    @foreach ($kategoris as $kategori)
                        <a type="button" href="{{ route('delete-kategori', $kategori->id) }}">
                            @php
                                $colors = ['primary', 'secondary', 'success', 'warning', 'info', 'dark'];
                                $rand_keys = array_rand($colors, 1);
                            @endphp
                            <span class="badge bg-{{ $colors[$rand_keys] }} text-white">
                                {{ $kategori->nama }}
                                <span style="color:red;">&times;</span>
                            </span>
                        </a>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submitKategori">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
