@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Permintaan: {{ $permintaan->code }}</h4>
        </div>
        <div class="card-body">
            @foreach ($dpermintaan as $dpmt)
                <div class="comment">
                    <div class="comment-header">
                        <div class="pr-50">
                            <div class="avatar avatar-2xl">
                                <img src="../assets/compiled/jpg/banana.jpg" alt="Avatar">
                            </div>
                        </div>
                        <div class="comment-body">
                            <div class="comment-profileName">Nama Barang: {{ $dpmt->item->name}}</div>
                            <div class="comment-profileName">Kuantiti: {{ $dpmt->quantity }}</div>
                            <div class="comment-actions">
                                <button class="btn icon icon-left btn-primary me-2 text-nowrap"><i
                                        class="bi bi-eye-fill"></i> Show</button>
                                <button class="btn icon icon-left btn-warning me-2 text-nowrap"><i
                                        class="bi bi-pencil-square"></i> Edit</button>
                                <button class="btn icon icon-left btn-danger me-2 text-nowrap"><i
                                        class="bi bi-x-circle"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
