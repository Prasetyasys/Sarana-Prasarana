@extends('layouts.unit-main')
@section('content')
<style>
    .card {
        transition: box-shadow 0.3s ease-in-out;
    }
    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }
    .text-primary {
        color: #007bff !important;
    }
    .border {
        border: 1px solid #dee2e6 !important;
    }
    .rounded {
        border-radius: 0.25rem !important;
    }
    .text-muted {
        color: #6c757d !important;
    }
    .h4 {
        margin-bottom: 0;
    }
</style>
<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Detail Barang</h3>
        </div>
        <div class="card-body">
            @foreach ($item as $i)
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 mt-4">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Informasi Utama</h4>
                            <div class="mb-3">
                                <h5 class="text-muted mb-1">Kode Barang</h5>
                                <p class="h4">{{ $i->code }}</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="text-muted mb-1">Nama Barang</h5>
                                <p class="h4">{{ $i->name }}</p>
                            </div>
                            <div class="mb-3">
                                <h5 class="text-muted mb-1">Kategori</h5>
                                <p class="h4">{{ $i->kategori->name }}</p>
                            </div>
                            <div>
                                <h5 class="text-muted mb-1">Tanggal Dibuat</h5>
                                <p class="h4">{{ \Carbon\Carbon::parse($i->created_at)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 mt-4">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Informasi Stok & Harga</h4>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="p-3 border bg-light rounded">
                                        <h5 class="text-primary">Satuan</h5>
                                        <p class="h4">{{ $i->unit }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 border bg-light rounded">
                                        <h5 class="text-primary">Harga</h5>
                                        <p class="h4">Rp {{ number_format($i->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 border bg-light rounded">
                                        <h5 class="text-primary">Stok Saat Ini</h5>
                                        <p class="h4">{{ $i->stock }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 border bg-light rounded">
                                        <h5 class="text-primary">Stok Minimum</h5>
                                        <p class="h4">{{ $i->minimum_stock }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h4 class="card-title">Deskripsi</h4>
                            <p class="card-text">{{ $i->description ?? 'Tidak ada deskripsi tersedia.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
