@extends('layouts.main')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('item.list')}}">Data barang</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
    </ol>
</nav>
{{-- <div class="row">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Barang</label>
                                </div>
                                <div class="col-md-8 form-group">
                                  <select class="col-md-8 form-group form-select form-control" id="basicSelect"
                                    name="satuan">
                                    <option selected value="-">-</option>
                                    <option value="Spidol">Spidol</option>
                                    <option value="Pulpen">Pulpen</option>
                                    <option value="Sapu">Sapu</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Jumlah</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" id="first-name-horizontal" class="col-md-8 form-group form-control" name="fname"
                                        placeholder="">
                                </div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Deskripsi</label>
                                </div>
                                <div class="col-md-8 form-group">
                                  <textarea class="col-md-8 form-group form-control" id="exampleFormControlTextarea1" placeholder="Type here ..." rows="3"
                                  name="description"></textarea>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Barang</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                @foreach ($item as $item)
                <form class="form" action="{{ route('item.update', $item->code)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kode" value="{{ $item->code }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Nama barang</label>
                                <input type="text" id="first-name-column" class="form-control" value="{{$item->name}}" required="required" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Kategori</label>
                                <select class="col-md-8 form-group form-select form-control" id="basicSelect"
                                    name="category_id">
                                    <option selected value="{{ $item->category_id }}">{{ $item->kategori->name }}</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Satuan</label>
                                <select class="col-md-8 form-group form-select form-control" id="basicSelect"
                                    name="unit">
                                    <option selected hidden value="{{ $item->unit }}">{{ $item->unit }}</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Rim">Rim</option>
                                    <option value="Ons">Ons</option>
                                    <option value="Kilo">Kilo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Merek</label>
                                <input type="text" id="last-name-column" class="form-control" value="{{$item->brand}}" required="required" name="brand">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Harga</label>
                                <input type="text" id="city-column" class="form-control" value="{{$item->price}}" required="required" name="price">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Stok</label>
                                <input type="text" id="city-column" class="form-control" value="{{$item->stock}}" required="required" name="stock">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Stok Mininum</label>
                                <input type="text" id="city-column" class="form-control" value="{{$item->minimum_stock}}" required="required" name="stokmin">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
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
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                            <button type="reset" class="btn btn-outline-secondary me-1 mb-1">Bersihkan</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
