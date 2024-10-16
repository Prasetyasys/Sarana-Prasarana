@extends('layouts.main')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    @foreach ($bm as $barangMasuk)
        <h2 class="mb-4">Barang Masuk: {{ $barangMasuk->code }}</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($detailbm as $dbm)
                @if ($dbm->incoming_item_code == $barangMasuk->code)
                    <div class="col">
                        <div class="card h-100 shadow-sm position-relative">
                            <img class="card-img-top" src="../assets/compiled/jpg/banana.jpg" alt="{{ $dbm->item->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dbm->item->name }}</h5>
                                <ul class="list-group list-group-flush mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Kode Barang
                                        <span class="badge bg-primary rounded-pill">{{ $dbm->item_code }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Kuantiti
                                        <span class="badge bg-success rounded-pill">{{ $dbm->quantity }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Satuan
                                        <span class="badge bg-info rounded-pill">{{ $dbm->item->unit }}</span>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="btn-edit" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
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
