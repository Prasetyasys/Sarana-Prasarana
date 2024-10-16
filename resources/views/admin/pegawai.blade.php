@extends('layouts.main')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Akun</li>
        </ol>
    </nav>
    <div class="row mx-2">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header navbar navbar-expand">
                    <div class="container-fluid">
                        <h3>Tabel Pegawai</h3>
                        <div class="collapse navbar-collapse" id="navbar-22">
                            <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPegawai">Tambah pegawai<i class="bi bi bi-person-fill-add ms-2"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="akun" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $p)
                            @csrf
                            <tr>
                                <td>{{ $p->nip}}</td>
                                <td>{{ $p->name}}</td>
                                <td>
                                    <div class="btn-group text-center" role="group" aria-label="item actions">
                                        <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('pegawai.destroy', $p->nip) }}" method="POST">
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
@include('modal.modalCreatePegawai')
@endsection
