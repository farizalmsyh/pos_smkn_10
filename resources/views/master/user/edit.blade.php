@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('update-user', [$user->id])}}" enctype="multipart/form-data" method="POST">
                  @csrf
                     <div class="card">
                        <div class="card-header bg-warning text-white">Ubah Data Pengguna</div>
                        <div class="card-body row">  
                            <div class="form-group col-md-12">
                                <label for="name">Nama Lengkap</label>
                                <input value="{{$user->name}}" type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input value="{{$user->email}}" type="email" name="email" class="form-control" placeholder="Masukkan email anda" required>
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="password">Current Password</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama anda" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required>
                            </div> -->
                            <div class="form-group col-md-6">
                                <label for="koperasi">Koperasi</label>
                                <select class="form-control" name="id_koperasi">
                                    <option disabled selected>Pilh Koperasi</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hak_akses">Hak Akses</label>
                                <select class="form-control" name="hak_akses">
                                    <option disabled selected>Pilh Hak Akses</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Masukan alamat anda" required>{{$user->alamat}}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kontak">No. Telpon</label>
                                <input value="{{$user->kontak}}" class="form-control" type="tel" name="kontak" pattern="[0]{1}[0-9]{11,14}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="foto">Foto Profile</label>
                                <input type="file" name="foto" accept="image/*" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="{{route('user')}}" class="btn btn-secondary" >Close</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection