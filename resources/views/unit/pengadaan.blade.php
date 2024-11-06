@extends('layouts.unit-main')

@section('content')
<style>
    body {
        background-color: #f8fafc;
        font-family: 'Inter', sans-serif;
    }

    .procurement-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        margin: 2rem auto;
    }

    .table-header {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: white;
        padding: 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
    }

    .search-box {
        position: relative;
    }

    .search-box .form-control {
        padding-left: 2.5rem;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
    }

    .search-box .search-icon {
        position: absolute;
        left: 0.875rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #f3f4f6;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        padding: 1rem;
        border: none;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .table td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e5e7eb;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-weight: 500;
        font-size: 0.875rem;
    }

    .status-pending {
        background-color: #fff7ed;
        color: #c2410c;
    }

    .status-approved {
        background-color: #f0fdf4;
        color: #166534;
    }

    .status-rejected {
        background-color: #fef2f2;
        color: #991b1b;
    }

    .procurement-code {
        font-family: 'Monaco', monospace;
        font-size: 0.875rem;
        color: #4f46e5;
        font-weight: 500;
    }

    .item-count {
        font-weight: 600;
        color: #1f2937;
    }

    .date-cell {
        color: #6b7280;
        font-size: 0.875rem;
    }

    .pagination {
        margin-top: 1.5rem;
    }

    .page-link {
        border: none;
        padding: 0.75rem 1rem;
        color: #4b5563;
        font-weight: 500;
        margin: 0 0.25rem;
        border-radius: 8px;
    }

    .page-link:hover {
        background-color: #f3f4f6;
        color: #4f46e5;
    }

    .page-item.active .page-link {
        background-color: #4f46e5;
        color: white;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .stats-value {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1f2937;
    }

    .stats-label {
        color: #6b7280;
        font-size: 0.875rem;
    }
</style>
<div class="container">
    <div class="procurement-container">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <h4 class="mb-0">Daftar Pengadaan</h4>
            </div>
            <!-- Add Button -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-pengadaan">
                <i class="bi bi-plus-lg"></i> Buat Pengadaan
            </button>
        </div>
        <!-- Stats Section -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">127</div>
                    <div class="stats-label">Total Pengadaan</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">85</div>
                    <div class="stats-label">Disetujui</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">32</div>
                    <div class="stats-label">Pending</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">10</div>
                    <div class="stats-label">Ditolak</div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Unit</th>
                        <th>Perihal</th>
                        <th>Total Item</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengadaan as $pda)
                    <tr>
                        <td><span class="procurement-code">{{ $pda->code }}</span></td>
                        <td><span class="item-count">{{ $pda->pegawai->nip }}</span></td>
                        <td><span class="item-count">{{ $pda->regarding }}</span></td>
                        <td><span class="item-count">{{ $pda->total_item }}</span></td>
                        <td>
                            @if ($pda->status == 'Selesai')
                                <span class="status-badge status-approved">{{ $pda->status }}</span>
                            @elseif ($pda->status == 'Menunggu')
                                <span class="status-badge status-pending">{{ $pda->status }}</span>
                            @elseif ($pda->status == 'Ditolak')
                                <span class="status-badge status-rejected">{{ $pda->status }}</span>
                            @endif
                        </td>
                        <td><span class="date-cell">{{\Carbon\Carbon::parse($pda->created_at)->format('d-m-Y')}}</span></td>
                        <td>
                            <a href="{{ route('pengadaan.show', $pda->code) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye me-1"></i>Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Tambahkan baris sesuai kebutuhan -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('modal.modalPengadaan')
@endsection
