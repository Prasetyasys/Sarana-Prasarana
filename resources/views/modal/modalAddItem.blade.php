<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Modal yang Ditingkatkan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .modal-header {
            background-color: #4e73df;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .modal-title {
            font-weight: 600;
        }
        .btn-close {
            color: white;
        }
        .form-label {
            font-weight: 500;
            color: #4e73df;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #d1d3e2;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
        .btn-outline-secondary {
            color: #4e73df;
            border-color: #4e73df;
        }
        .btn-outline-secondary:hover {
            background-color: #4e73df;
            color: white;
        }
    </style>
</head>
<body>


<!-- Improved Modal -->
<div class="modal fade" id="addItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <i class="fas fa-box-open me-2"></i>Tambah Barang
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama barang</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" id="stock" class="form-control" name="stock" required>
                        </div>
                        <div class="col-md-6">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="category_id" required>
                                <option selected disabled value="">Pilih kategori...</option>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="stokmin" class="form-label">Stok Minimum</label>
                            <input type="number" id="stokmin" class="form-control" name="stokmin" required>
                        </div>
                        <div class="col-md-6">
                            <label for="unit" class="form-label">Satuan</label>
                            <select class="form-select" id="satuan" name="unit" required>
                                <option selected disabled value="">Pilih satuan...</option>
                                <option value="Pcs">Pcs</option>
                                <option value="Rim">Rim</option>
                                <option value="Ons">Ons</option>
                                <option value="Kilo">Kilo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" id="harga" class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="desc" class="form-label">Description</label>
                            <input type="textarea" rows="3" id="desc" class="form-control" name="description" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-undo me-1"></i>Bersihkan
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
