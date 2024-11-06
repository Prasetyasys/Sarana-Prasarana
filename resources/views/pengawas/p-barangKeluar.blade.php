@extends('layouts.pengawasMain')
@section('content')
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Barang Keluar</li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Barang Keluar</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="barangKeluarTable" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Unit</th>
                                <th>Kuantiti</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangKeluar as $brk )
                            <tr>
                                <td>{{ $brk->pegawai->name }}</td>
                                <td>{{ $brk->total_item }}</td>
                                <td>{{ $brk->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($brk->created_at)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('item.detailbrk', $brk->code) }}" class="btn btn-sm btn-outline-primary">
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
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.css"
        rel="stylesheet">
    <style>
        /* Custom styles for dark mode compatibility */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: inherit;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: inherit !important;
        }

        /* Custom styles for buttons */
        .btn-group .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
@endpush
