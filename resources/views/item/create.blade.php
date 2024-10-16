@extends('layouts.main')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('item.list')}}">Data barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Item</li>
    </ol>
</nav>
<div class="row mx-2">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Barang</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form" action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Nama barang</label>
                                <input type="text" id="first-name-column" class="form-control" name="name" required="required">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Stok</label>
                                <input type="text" id="city-column" class="form-control" name="stock" required="required">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Kategori</label>
                                <select class="col-md-8 form-group form-select form-control" id="basicSelect"
                                    name="category_id">
                                    <option selected hidden></option>
                                    @foreach ($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Stok Mininum</label>
                                <input type="text" id="city-column" class="form-control" name="stokmin" required="required">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Satuan</label>
                                <select class="col-md-8 form-group form-select form-control" id="basicSelect"
                                    name="unit">
                                    <option hidden value=""></option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Rim">Rim</option>
                                    <option value="Ons">Ons</option>
                                    <option value="Kilo">Kilo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Harga</label>
                                <input type="text" id="city-column" class="form-control" name="price" required="required">
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Gambar</label>
                                <div class="input-group mb-2">
                                    <div class="input-group mb-2">
                                        <label class="input-group-text" for="inputGroupFile01"><i
                                                class="bi bi-upload"></i></label>
                                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                            <button type="reset" class="btn btn-outline-secondary me-1 mb-1">Bersihkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
