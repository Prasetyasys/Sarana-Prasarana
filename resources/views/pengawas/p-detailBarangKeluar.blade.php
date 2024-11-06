@extends('layouts.pengawasMain')
@section('content')
<div class="container py-5">
    {{-- {{ dd($barangKeluar) }} --}}
            <h2 class="mb-4">Barang Keluar: {{ $barangKeluar[0]->code }}</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($detailBarangKeluar as $dbrk)
                    @if ($dbrk->outgoing_item_code == $barangKeluar[0]->code)
                        <div class="col">
                            <div class="card h-100 shadow-sm position-relative">
                                <img class="card-img-top" src="../assets/compiled/jpg/banana.jpg" alt="{{ $dbrk->item->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dbrk->item->name }}</h5>
                                    <ul class="list-group list-group-flush mt-3">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Kode Barang
                                            <span class="badge bg-primary rounded-pill">{{ $dbrk->item_code }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Kuantiti
                                            <span class="badge bg-success rounded-pill">{{ $dbrk->quantity }}</span>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <button type="button" class="btn-edit" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button> --}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
    </div>

    <style>
    .card {
        transition: transform 0.3s ease-in-out;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .btn-edit {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #007bff;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-edit:hover {
        background-color: #0056b3;
        transform: scale(1.1);
    }
    .btn-edit i {
        font-size: 1.2rem;
    }
    </style>

@endsection
