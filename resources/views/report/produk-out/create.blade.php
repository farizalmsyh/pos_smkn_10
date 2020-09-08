@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('produk-out-save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header bg-success text-white">Tambah Laporan Barang Keluar</div>
                        <div class="card-body row">        
                            <div class="form-group col-md-12">
                                <label for="nama_bahan">Nama Produk</label>
                                <select class="js-example-responsive js-states form-control" style="width: 100%" name="id_produk" required>
                                    @foreach(App\Model\Produk::all() as $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="satuan">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="type_masuk">Via</label>
                                <input type="text" name="type_keluar" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="{{route('produk-in')}}" class="btn btn-secondary" >Close</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
      $('.js-example-responsive').select2({
        placeholder: "Pilih Produk",
        allowClear: true,
        width: 'resolve'
      });
    });
  </script>