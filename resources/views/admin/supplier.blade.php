@extends('layouts.main')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Supplier</li>
        </ol>
    </nav>
    <div class="row mx-2">
        {{-- DELELTE DIGANTI COFIG DATA TABLE --}}
        {{-- <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Kategori</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="first-name-column"></label>
                            <input type="text" id="first-name-column" class="form-control" name="nama">
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambahkan</button>
                            <button type="reset" class="btn btn-outline-secondary me-1 mb-1">Bersihkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header navbar navbar-expand">
                    <div class="container-fluid">
                        {{-- <a class="navbar-brand" href="#">
                            <h4>Tabel Kategori</h4>
                        </a> --}}
                        <h3>Tabel supplier</h3>
                        <div class="collapse navbar-collapse" id="navbar-22">
                            <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSupp">Tambah Supplier<i class="bi bi-plus-circle ms-2"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <button class="btn btn-light-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Create</button> --}}
                    <table id="categories" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $s)
                            <tr>
                                <td>{{ $s->code }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->address }}</td>
                                <td>
                                    <div class="btn-group text-center" role="group" aria-label="item actions">
                                        {{-- <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a> --}}
                                        <form action="{{ route('supplier.destroy', $s->code) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
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
</div>
@include('modal.modalCreateSupp')
@endsection
