@extends('layouts.main')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Barang Keluar</li>
    </ol>
</nav>
<div class="container mx-1">
    <div class="card">
        <div class="card-body">
            <div class="dataTable-top d-flex mb-3">
                <div class="dataTable-search">
                  <input class="dataTable-input" placeholder="Search" type="text" />
                </div>
                <div class="dataTable-dropdown ms-3">
                  <select class="dataTable-selector form-select">
                    <option value="All" selected="">All Categories</option>
                    <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                    <option value="Alat Kebersihan">Alat Kebersihan</option>
                  </select>
                </div>
            </div>
            <table id="item" class="table table-striped table-bordered text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Permintaan</th>
                        <th>Nip</th>
                        <th>Jumlah Item</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
@endsection
