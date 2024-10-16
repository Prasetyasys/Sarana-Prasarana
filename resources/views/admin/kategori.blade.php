@extends('layouts.main')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Item categories</li>
        </ol>
    </nav>
    <div class="row mx-2">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header navbar navbar-expand">
                    <div class="container-fluid">
                        <h3>Daftar Kategori</h3>
                        <div class="collapse navbar-collapse" id="navbar-22">
                            <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Kategori<i class="bi bi-plus-circle ms-2"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="categories" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th> Nama Kategori</th>
                                <th> Alias</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->name }}</td>
                                <td>{{ $k->alias }}</td>
                                <td>
                                    <div class="btn-group text-center" role="group" aria-label="item actions">
                                        <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('kategori.destroy', $k->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
</div>
@include('modal.modalCreate')
@endsection
