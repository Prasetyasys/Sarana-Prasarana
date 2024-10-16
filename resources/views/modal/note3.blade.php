<div class="modal fade" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email-id-column" class="mb-2">Nama</label>
                    <select class="col-md-8 form-group form-select form-control mb-4" id="basicSelect"
                        name="nip">
                        <option selected hidden></option>
                        @foreach ($pegawai as $u)
                            <option value="{{ $u->nip }}">{{ $u->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="first-name-column" class="mb-2">Username</label>
                    <input type="text" id="first-name-column" class="form-control mb-4" name="username" required="required">
                </div>
                <div class="form-group">
                    <label for="first-name-column" class="mb-2">Password</label>
                    <input type="password" id="first-name-column" class="form-control mb-4" name="password" required="required" minlength="10">
                </div>
                <div class="form-group">
                    <label for="email-id-column" class="mb-2">Role</label>
                    <select class="col-md-8 form-group form-select form-control mb-4" id="basicSelect"
                        name="role">
                        <option selected hidden></option>
                        <option value="Admin">Admin</option>
                        <option value="Pengawas">Pengawas</option>
                        <option value="Unit">Unit</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
