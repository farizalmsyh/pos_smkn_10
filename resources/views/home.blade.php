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
                                    <td>Jenis Kelamin :</td>
                                    <td>@if(Auth::user()->gender == 'male') Laki-Laki @elseif(Auth::user()->gender == 'female') Perempuan @else - @endif</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir :</td>
                                    <td>@if(Auth::user()->birth_date != null || ''){{\Carbon\Carbon::parse(Auth::user()->birth_date)->locale('id')->isoFormat('Do MMMM YYYY')}}@else - @endif</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{Auth::user()->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Kontak</td>
                                    <td>{{Auth::user()->kontak}}</td>
                                </tr>
                                <tr>
                                    <td>Koperasi</td>
                                    <td>{{\App\Model\Profil::where('_id', Auth::user()->id_koperasi)->value('nama_koperasi')}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td class="text-capitalize">{{Auth::user()->hak_akses}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
