<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Login</h1>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
<<<<<<< HEAD
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
=======
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name">
>>>>>>> 740fe1f (add fitur tambah kategori)
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
