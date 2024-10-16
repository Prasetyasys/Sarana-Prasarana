<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first-name-column" class="mb-3">Nama Kategori</label>
                    <input type="text" id="first-name-column" class="form-control mb-4" name="nama" placeholder="" required="required">
                </div>
                <div class="form-group">
                    <label for="first-name-column" class="mb-3">Alias</label>
                    <input type="text" id="first-name-column" class="form-control mb-4" name="alias" placeholder="" required="required">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
