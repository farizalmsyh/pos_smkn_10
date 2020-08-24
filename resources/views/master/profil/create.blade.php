@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('save-profil')}}" enctype="multipart/form-data" method="POST">
                  {{ csrf_field() }}
                     <div class="card">
                        <div class="card-header bg-success text-white">Tambah Data Toko</div>
                        <div class="card-body row">  
                            <div class="form-group col-md-12">
                                <label for="name_koperasi">Nama Instansi</label>
                                <input type="text" name="nama_koperasi" class="form-control" placeholder="Masukkan nama instansi" required>
                                @if ($errors->has('nama_koperasi'))
                                    <span class="text-danger">{{ $errors->first('nama_koperasi') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6" {{ $errors->has('telepon') ? 'has-error' : '' }}>
                                <label for="telepon">Telpon</label>
                                <input class="form-control" type="tel" name="telepon" placeholder="Masukkan nomor telepon" pattern="[0]{1}[0-9]{11,14}" required>
                                @if ($errors->has('telepon'))
                                    <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" placeholder="Masukkan kode pos" required>
                                @if ($errors->has('kode_pos'))
                                    <span class="text-danger">{{ $errors->first('kode_pos') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" placeholder="Masukan keterangan" required></textarea>
                                @if ($errors->has('keterangan'))
                                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat_koperasi">Alamat</label>
                                <textarea class="form-control" name="alamat_koperasi" placeholder="Masukan alamat" required></textarea>
                                @if ($errors->has('alamat_koperasi'))
                                    <span class="text-danger">{{ $errors->first('alamat_koperasi') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="foto">Foto Instansi</label>
                                <input type="file" name="foto" accept="image/*">
                                @if ($errors->has('foto'))
                                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="{{route('profil')}}" class="btn btn-secondary" >Close</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection