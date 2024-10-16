@extends('layouts.main')

@section('content')
<div class="container-fluid py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Barang Masuk</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Barang Masuk</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-barangmasuk">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Barang Masuk
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="barangMasukTable" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Petugas Sarpas</th>
                            <th>Supplier</th>
                            <th>Jumlah Barang</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bm as $barangMasuk)
                        <tr>
                            <td>{{ $barangMasuk->code }}</td>
                            <td>{{ $barangMasuk->user->username }}</td>
                            <td>{{ $barangMasuk->supplier->name }}</td>
                            <td>{{ $barangMasuk->total_item }}</td>
                            <td>{{ \Carbon\Carbon::parse($barangMasuk->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('item.detailBM', $barangMasuk->code) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye me-1"></i>Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('modal.modalbarangMasuk')

@endsection

@push('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
    $('#barangMasukTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
@endpush
