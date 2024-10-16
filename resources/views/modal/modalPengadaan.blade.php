<style>
    :root {
        --modal-bg: #ffffff;
        --modal-border: #e9ecef;
        --text-color: #495057;
        --input-bg: #ffffff;
        --input-border: #ced4da;
        --btn-bg: #f8f9fa;
    }

    [data-bs-theme="dark"] {
        --modal-bg: #343a40;
        --modal-border: #495057;
        --text-color: #e9ecef;
        --input-bg: #495057;
        --input-border: #6c757d;
        --btn-bg: #495057;
    }

    .modal-content {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        background-color: var(--modal-bg);
    }

    .modal-header {
        border-bottom: 1px solid var(--modal-border);
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .modal-title {
        font-weight: 600;
        color: var(--text-color);
    }

    .form-group {
        border: 1px solid var(--modal-border);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .form-label {
        font-weight: 500;
        color: var(--text-color);
    }

    .form-select,
    .form-control {
        border-radius: 5px;
        background-color: var(--input-bg);
        color: var(--text-color);
        border-color: var(--input-border);
    }

    .number-input-container {
        display: flex;
        align-items: center;
    }

    .number-input {
        display: flex;
        align-items: center;
        border: 1px solid var(--input-border);
        border-radius: 5px;
        overflow: hidden;
        flex-grow: 1;
    }

    .number-input button {
        width: 30px;
        height: 38px;
        padding: 0;
        font-size: 14px;
        background-color: var(--btn-bg);
        border: none;
        color: var(--text-color);
    }

    .number-input input {
        text-align: center;
        width: 50px;
        margin: 0;
        border: none;
        background-color: var(--input-bg);
        color: var(--text-color);
    }

    .hapus-form {
        margin-left: 10px;
        padding: 8px 12px;
        font-size: 14px;
        width: 70px;
    }

    #tambahForm {
        margin-bottom: 20px;
    }

    .modal-footer {
        border-top: 1px solid var(--modal-border);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
<div class="modal fade bd-pengadaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengadaan.store') }}" method="POST" enctype="multipart/form-data"
                    id="pengadaanForm">
                    @csrf
                    <div class="form-group">
                        <label for="unit" class="mb-2">Unit</label>
                        <select class="col-md-8 form-group form-select form-control mb-4" id="nip" name="nip">
                            <option selected hidden></option>
                            @foreach ($pegawai as $p)
                                <option value="{{ $p->nip }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="regarding" class="mb-2">Perihal</label>
                        <textarea class="col-md-8 form-group form-control mb-4" id="perihal" name="regarding" rows="3"></textarea>
                    </div>
                    <div id="formContainer">
                        <div class="form-group barang-form">
                            <div class="row mb-3">
                                <div class="col-md-7">
                                    <label for="namaBarang[]" class="form-label mb-2">Pilih Barang</label>
                                    <select class="form-select mb-4" name="item[]" required>
                                        <option selected hidden></option>
                                        @foreach ($item as $i)
                                            <option value="{{ $i->code }}">{{ $i->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="jumlah[]" class="form-label mb-2">Jumlah</label>
                                    <div class="d-flex gap-2">
                                        <div class="number-input-container">
                                            <div class="number-input">
                                                <button type="button" class="btn decrease">-</button>
                                                <input type="number" class="form-control" name="jumlah[]"
                                                    value="1" min="1" required>
                                                <button type="button" class="btn increase">+</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm hapus-form"
                                            style="display: none;">X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="tambahForm">Tambah Form</button>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formContainer = document.getElementById('formContainer');
        const tambahFormBtn = document.getElementById('tambahForm');

        tambahFormBtn.addEventListener('click', function() {
            const newForm = formContainer.firstElementChild.cloneNode(true);
            newForm.querySelector('select[name="item[]"]').value = '';
            newForm.querySelector('input[name="jumlah[]"]').value = '1';
            newForm.querySelector('.hapus-form').style.display = 'block';
            formContainer.appendChild(newForm);
            updateDeleteButtons();
        });

        formContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('hapus-form')) {
                if (formContainer.children.length > 1) {
                    e.target.closest('.barang-form').remove();
                    updateDeleteButtons();
                } else {
                    alert('Minimal harus ada satu form barang.');
                }
            }

            if (e.target.classList.contains('increase')) {
                const input = e.target.previousElementSibling;
                input.value = parseInt(input.value) + 1;
            }

            if (e.target.classList.contains('decrease')) {
                const input = e.target.nextElementSibling;
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        });

        function updateDeleteButtons() {
            const deleteBtns = formContainer.querySelectorAll('.hapus-form');
            deleteBtns.forEach((btn, index) => {
                btn.style.display = index === 0 && formContainer.children.length === 1 ? 'none' :
                    'block';
            });
        }
    });

    function submitForm() {
        const form = document.querySelector('#pengadaanForm');
        form.submit();
    }
</script>
