Saya akan menambahkan button tambah dengan modal dan button kembali ke halaman sebelumnya. Berikut adalah kodenya:

```html
<div class="container">
    <div class="procurement-container">
        <!-- Back Button and Title Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <a href="javascript:history.back()" class="btn btn-outline-secondary me-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <h4 class="mb-0">Daftar Permintaan</h4>
            </div>
            <!-- Add Button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProcurementModal">
                <i class="bi bi-plus-lg"></i> Tambah Permintaan
            </button>
        </div>

        <!-- Search Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="search-box">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="form-control" placeholder="Cari permintaan...">
                </div>
            </div>
        </div>

        <!-- Rest of your existing code... -->

        <!-- Add Modal -->
        <div class="modal fade" id="addProcurementModal" tabindex="-1" aria-labelledby="addProcurementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProcurementModalLabel">Tambah Permintaan Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="procurementForm">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Permintaan</label>
                                <input type="text" class="form-control" id="kode" readonly value="PO-2024-004">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="items" class="form-label">Item</label>
                                <div id="itemContainer">
                                    <div class="item-row d-flex gap-2 mb-2">
                                        <select class="form-select" required>
                                            <option value="">Pilih Item</option>
                                            <option value="1">Item 1</option>
                                            <option value="2">Item 2</option>
                                        </select>
                                        <input type="number" class="form-control" placeholder="Jumlah" required>
                                        <button type="button" class="btn btn-danger btn-remove-item">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="addItemButton">
                                    <i class="bi bi-plus"></i> Tambah Item
                                </button>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="submitProcurement">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
/* Additional CSS */
.procurement-container {
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.btn-outline-secondary {
    border-color: #dee2e6;
}

.btn-outline-secondary:hover {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}

.modal-content {
    border: none;
    border-radius: 8px;
}

.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.item-row {
    align-items: center;
}

.btn-remove-item {
    padding: 0.375rem 0.75rem;
}

@media (max-width: 768px) {
    .item-row {
        flex-direction: column;
        gap: 0.5rem;
    }

    .btn-remove-item {
        width: 100%;
    }
}
</style>

<script>
// JavaScript for handling dynamic item rows
document.addEventListener('DOMContentLoaded', function() {
    const addItemButton = document.getElementById('addItemButton');
    const itemContainer = document.getElementById('itemContainer');

    // Add new item row
    addItemButton.addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.className = 'item-row d-flex gap-2 mb-2';
        newRow.innerHTML = `
            <select class="form-select" required>
                <option value="">Pilih Item</option>
                <option value="1">Item 1</option>
                <option value="2">Item 2</option>
            </select>
            <input type="number" class="form-control" placeholder="Jumlah" required>
            <button type="button" class="btn btn-danger btn-remove-item">
                <i class="bi bi-trash"></i>
            </button>
        `;
        itemContainer.appendChild(newRow);
    });

    // Remove item row
    itemContainer.addEventListener('click', function(e) {
        if (e.target.closest('.btn-remove-item')) {
            const row = e.target.closest('.item-row');
            row.remove();
        }
    });

    // Handle form submission
    const submitButton = document.getElementById('submitProcurement');
    submitButton.addEventListener('click', function() {
        const form = document.getElementById('procurementForm');
        if (form.checkValidity()) {
            // Add your form submission logic here
            alert('Form submitted successfully!');
            $('#addProcurementModal').modal('hide');
        } else {
            form.reportValidity();
        }
    });
});
</script>
```

Beberapa poin penting dari kode di atas:

1. **Button Kembali**:
   - Menggunakan `javascript:history.back()` untuk kembali ke halaman sebelumnya
   - Dilengkapi dengan icon arrow-left dari Bootstrap Icons
   - Posisi di kiri atas

2. **Button Tambah**:
   - Posisi di kanan atas
   - Menggunakan modal Bootstrap untuk form tambah
   - Dilengkapi dengan icon plus

3. **Modal Form**:
   - Form responsif dengan validasi
   - Fitur dynamic form untuk menambah/hapus item
   - Menggunakan Bootstrap modal
   - Validasi form menggunakan HTML5 validation

4. **Styling**:
   - Clean dan modern design
   - Fully responsive
   - Konsisten dengan design sistem yang ada
   - Menggunakan Bootstrap classes

5. **JavaScript**:
   - Dynamic form handling
   - Form validation
   - Modal handling
   - Event listeners untuk interaktivitas

Pastikan Anda sudah include Bootstrap CSS, Bootstrap JS, dan Bootstrap Icons:

```html
<!-- Di bagian head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

<!-- Di bagian bottom body -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
```

Apakah ada yang perlu saya jelaskan lebih detail?
