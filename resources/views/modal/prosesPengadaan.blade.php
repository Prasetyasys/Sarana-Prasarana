<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-approval {
            backdrop-filter: blur(5px);
        }

        .modal-content {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .modal-header {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .quantity-input {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .quantity-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-approve {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-cancel {
            border: 2px solid #e5e7eb;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #4b5563;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
        }

        .info-text {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .status-badge {
            background-color: #dbeafe;
            color: #1e40af;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade modal-approval" id="submissionProcess" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">
                    Persetujuan Kuantitas
                    <span class="status-badge ms-2">Menunggu</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengadaan.accept') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $dpda->id }}">
                    <div class="mb-4">
                        <label for="currentQuantity" class="form-label fw-semibold">Kuantitas Saat Ini</label>
                        <input type="number" class="form-control quantity-input" id="quantity" name="quantity" value="{{ $dpda->quantity }}" readonly>
                        <small class="info-text">Kuantitas yang telah diajukan</small>
                    </div>

                    <div class="mb-4">
                        <label for="approvedQuantity" class="form-label fw-semibold">Kuantitas yang Disetujui</label>
                        <input type="number" class="form-control quantity-input" id="quantity_approved" name="quantity_approved" required>
                        <small class="info-text">Masukkan kuantitas yang disetujui</small>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-approve text-white">Setujui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script>
    function handleApproval() {
        const approvedQuantity = document.getElementById('approvedQuantity').value;
        const notes = document.getElementById('notes').value;

        if (!approvedQuantity) {
            alert('Mohon masukkan kuantitas yang disetujui');
            return;
        }

        // Di sini Anda bisa menambahkan logika untuk memproses persetujuan
        console.log('Kuantitas yang disetujui:', approvedQuantity);
        console.log('Catatan:', notes);

        // Tampilkan pesan sukses
        alert('Persetujuan berhasil disimpan!');

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('approvalModal'));
        modal.hide();
    }

    // Validasi input hanya angka
    document.getElementById('approvedQuantity').addEventListener('input', function(e) {
        if (!/^\d*$/.test(e.target.value)) {
            e.target.value = e.target.value.replace(/[^\d]/g, '');
        }
    });
</script> --}}
</body>
</html>
