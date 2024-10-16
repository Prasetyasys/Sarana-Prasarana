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
                        <h3>Tabel user</h3>
                        <div class="collapse navbar-collapse" id="navbar-22">
                            <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Tambah User<i class="bi bi bi-person-fill-add ms-2"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="akun" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            @csrf
                            <tr>
                                <td>{{ $u->pegawai->name }}</td>
                                <td>{{ $u->role }}</td>
                                <td>{{ $u->username }}</td>
                                <td>
                                    <div class="btn-group text-center" role="group" aria-label="item actions">
                                        <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('user.destroy', $u->nip) }}" method="POST">
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
@include('modal.modalCreateAcc')
@endsection
