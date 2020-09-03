@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('master-produk-save-stok', [$produk->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header bg-success text-white">Tambah Stok Produk {{$produk->nama}}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Nama Produk   : {{$produk->nama}}</h4>
                                    <h4>Stok Saat Ini : {{$produk->stok}}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center">
                                <input type="hidden" value="{{$produk->stok}}" name="stok_now">
                                <div class="form-group col-md-10">
                                    <label for="stok">Jumlah Stok Yang Ingin Ditambah</label>
                                    <input name="stok_added" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="{{route('master-produk')}}" class="btn btn-secondary" >Close</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection