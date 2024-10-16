@extends('layouts.main')

@section('content')
<div class="container-fluid py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Data Barang</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Barang
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 mb-2">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                </div>
                <div class="col-md-4 mb-2">
                    <select id="kategoriFilter" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="itemTable" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Stok Minimum</th>
                            {{-- <th>Tanggal</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $i)
                            <tr>
                                <td>{{$i->code}}</td>
                                <td>{{$i->name}}</td>
                                <td>{{$i->kategori->alias}}</td>
                                <td>{{$i->unit}}</td>
                                <td>Rp. {{number_format($i->price, 0, ',', '.')}}</td>
                                <td>{{$i->stock}}</td>
                                <td>{{$i->minimum_stock}}</td>
                                {{-- <td>{{\Carbon\Carbon::parse($i->created_at)->format('d-m-Y')}}</td> --}}
                                <td>
                                    <div class="btn-group text-center" role="group" aria-label="item actions">
                                        <a href="{{ route('item.show', $i->code) }}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('item.edit', $i->code) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('item.destroy', $i->code) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                        {{-- <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button> --}}
                                        {{-- <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-none" id="formDelete{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modal.modalAddItem')
@endsection

@push('styles')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.css" rel="stylesheet">
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
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
    var table = $('#itemTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(difilter dari _MAX_ total data)",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        },
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        serverSide: true,
        ajax: {
            url: "{{ route('item.data') }}",
            type: 'GET'
        },
        columns: [
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'kategori.nama', name: 'kategori.nama' },
            { data: 'satuan', name: 'satuan' },
            {
                data: 'harga',
                name: 'harga',
                render: function(data, type, row) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(data);
                }
            },
            { data: 'stok', name: 'stok' },
            { data: 'stok_minimum', name: 'stok_minimum' },
            {
                data: 'created_at',
                name: 'created_at',
                render: function(data, type, row) {
                    return moment(data).format('DD-MM-YYYY');
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                        <div class="btn-group" role="group">
                            <a href="#" class="btn btn-sm btn-outline-success" title="Lihat"><i class="bi bi-eye"></i></a>
                            <a href="${route('item.edit', row.kode)}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="${route('item.destroy', row.kode)}" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></a>
                        </div>
                    `;
                }
            }
        ],
        initComplete: function(settings, json) {
            $('.dataTables_wrapper').addClass('bg-body-tertiary text-body');
            $('.dataTables_filter input').addClass('bg-body-tertiary text-body');
            $('.dataTables_length select').addClass('bg-body-tertiary text-body');
        }
    });

    $('#searchInput').on('keyup', function() {
        table.search(this.value).draw();
    });

    $('#kategoriFilter').on('change', function() {
        table.column(2).search(this.value).draw();
    });

    // Listen for theme changes and update DataTables accordingly
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        table.draw();
    });
});
</script>
@endpush
