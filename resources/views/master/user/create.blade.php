@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('save-user')}}" enctype="multipart/form-data" method="POST">
                  {{ csrf_field() }}
                     <div class="card">
                        <div class="card-header bg-success text-white">Tambah Data Pengguna</div>
                        <div class="card-body row">  
                            <div class="form-group col-md-6" {{ $errors->has('name') ? 'has-error' : '' }}>
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6" {{ $errors->has('email') ? 'has-error' : '' }}>
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6" {{ $errors->has('password') ? 'has-error' : '' }}>
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6" {{ $errors->has('confirm_password') ? 'has-error' : '' }}>
                                <label for="password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Masukkan password anda" required>
                                @if ($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="koperasi">Koperasi</label>
                                <select class="form-control" name="id_koperasi">
                                    <option disabled selected>Pilh Koperasi</option>
                                    @foreach(\App\Model\Profil::all() as $key => $value)
                                    <option value="{{$value->id}}">{{$value->nama_koperasi}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_koperasi'))
                                    <span class="text-danger">{{ $errors->first('id_koperasi') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hak_akses">Hak Akses</label>
                                <select class="form-control" name="hak_akses" >
                                    <option disabled selected>Pilh Hak Akses</option>
                                    @if(Auth::user()->hak_akses == 'superadmin' || Auth::user()->hak_akses == 'admin')
                                    @if(Auth::user()->hak_akses == 'superadmin')
                                    <option value="superadmin">Superadmin</option>
                                    @endif
                                    <option value="admin">Admin Koperasi</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="gudang">Admin Gudang</option>
                                    @endif
                                </select>
                                @if ($errors->has('hak_akses'))
                                    <span class="text-danger">{{ $errors->first('hak_akses') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Masukan alamat anda" required></textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6" {{ $errors->has('phone') ? 'has-error' : '' }}>
                                <label for="kontak">No. Telpon</label>
                                <input class="form-control" type="tel" name="kontak" pattern="[0]{1}[0-9]{11,14}" required>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="foto">Foto Profile</label>
                                <input type="file" name="foto" accept="image/*">
                                @if ($errors->has('foto'))
                                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                                @endif
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