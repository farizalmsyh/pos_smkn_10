@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header pb-2">
                        <h5 class="card-title ">Data Diri Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <img src="{{url('img/profile-picture/'.Auth::user()->foto)}}" class="img-thumbnail" alt="profile_picture" >
                            </div>
                        </div>
                        <div class="row pt-3 pb-0">
                            <table class="table table-light table-striped">
                                <tr>
                                    <td>Nama :</td>
                                    <td>{{Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{Auth::user()->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Kontak</td>
                                    <td>0{{Auth::user()->kontak}}</td>
                                </tr>
                                <tr>
                                    <td>Koperasi</td>
                                    <td>{{Auth::user()->id_koperasi == 1 ? 'Admin' : 'User'}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>{{Auth::user()->hak_akses == 1 ? 'Super Admin' : 'User'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
