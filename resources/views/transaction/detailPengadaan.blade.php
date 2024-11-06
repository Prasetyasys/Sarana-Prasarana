@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pengadaan: {{ $pengadaan->code }}</h4>
        </div>
        <div class="card-body mt-4">
            @foreach ($dpengadaan as $dpda)
                <div class="comment">
                    <div class="comment-header">
                        <div class="pr-50">
                            <div class="avatar avatar-2xl">
                                <img src="../assets/compiled/jpg/banana.jpg" alt="Avatar">
                            </div>
                        </div>
                        <div class="comment-body">
                            <div class="comment-profileName">Nama Barang: {{ $dpda->item->name}}</div>
                            <div class="comment-profileName">
                                Jumlah Pemintaan: {{ $dpda->quantity }}
                            </div>
                            <div class="comment-profileName">
                                @if ($dpda->quantity_approved < 0)
                                    Jumlah barang yang diterima : Belum diproses
                                @elseif ($dpda->quantity_approved == 0)
                                    Jumlah barang yang diterima : -
                                @elseif ($dpda->quantity_approved > 0)
                                    Jumlah barang yang diterima : {{ $dpda->quantity_approved }}
                                @endif
                            </div>
                            {{-- <div class="comment-actions">
                                <button class="btn icon icon-left btn-primary me-2 text-nowrap"><i
                                        class="bi bi-gear-wide-connected"></i> Process</button>
                                <button class="btn icon icon-left btn-warning me-2 text-nowrap"><i
                                        class="bi bi-pencil-square"></i> Edit</button>
                                <button class="btn icon icon-left btn-danger me-2 text-nowrap"><i
                                        class="bi bi-x-circle"></i> Decline</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
