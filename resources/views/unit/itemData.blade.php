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
                <h4 class="mb-0">Data Barang</h4>
            </div>
            <!-- Add Button -->
        </div>

        <!-- Stats Section -->
        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Stok Minimum</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item as $i)
                            <tr>
                                <td><span class="procurement-code">{{$i->code}}</span></td>
                                <td><span class="item-count">{{$i->name}}</span></td>
                                <td>{{$i->kategori->alias}}</td>
                                <td><span class="item-count">{{$i->unit}}</span></td>
                                <td><span class="date-cell">Rp. {{number_format($i->price, 0, ',', '.')}}</span></td>
                                <td><span class="item-count">{{$i->stock}}</span></td>
                                <td><span class="item-count">{{$i->minimum_stock}}</span></td>
                                <td>
                                    <a href="{{ route('item.show', $i->code) }}" class="btn btn-sm btn-outline-primary">
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
@endsection
