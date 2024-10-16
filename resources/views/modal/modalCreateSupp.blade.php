<div class="modal fade" id="createSupp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Supplier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first-name-column" class="mb-2">Nama Supplier</label>
                    <input type="text" id="first-name-column" class="form-control mb-4" name="name" required="required">
                </div>
                <div class="form-group">
                    <label for="first-name-column" class="mb-2">Alamat</label>
                    <input type="text" id="first-name-column" class="form-control mb-4" name="address" required="required">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
