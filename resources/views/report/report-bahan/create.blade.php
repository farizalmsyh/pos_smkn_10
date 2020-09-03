@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('report-bahan-save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header bg-success text-white">Tambah Laporan Bahan</div>
                        <div class="card-body row">        
                            <div class="form-group col-md-12">
                                <label for="nama_bahan">Nama Bahan</label>
                                <select class="js-example-responsive js-states form-control" style="width: 100%" name="nama_bahan" required>
                                    @foreach(App\Model\MasterBahan::all() as $value)
                                    <option value="{{$value->id}}">{{$value->nama_bahan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="satuan">Satuan</label>
                                <input type="text" name="satuan" class="form-control" required>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
      $('.js-example-responsive').select2({
        placeholder: "Pilih Bahan",
        allowClear: true,
        width: 'resolve'
      });
    });
  </script>