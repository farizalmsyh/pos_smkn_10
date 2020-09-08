@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-info text-white"><h5><i class="fas fa-file"></i> Detail Transaksi</h5></div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <img src="{{url('img/profile-picture/'.\App\User::where('_id', $transaksi->kasir)->value('foto'))}}" class="img-fluid"  alt="Profil picture">
                            </div>
                            <div class="col-md-9 my-auto">
                                <table>
                                    <tr>
                                        <td><h4>Tanggal</h4></td>
                                        <td><h4>&nbsp;:&nbsp;</h4></td>
                                        <td><h4>{{Carbon\Carbon::parse($transaksi->tanggal)->locale('id')->isoFormat('dddd, DDDD MMMM YYYY')}}</h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Nama Kasir</h4></td>
                                        <td><h4>&nbsp;:&nbsp;</h4></td>
                                        <td><h4>{{\App\User::where('_id', $transaksi->kasir)->value('name')}}</h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Sub Harga</h4></td>
                                        <td><h4>&nbsp;:&nbsp;</h4></td>
                                        <td><h4>Rp. {{$transaksi->subharga}}</h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Nominal Pembayaran</h4></td>
                                        <td><h4>&nbsp;:&nbsp;</h4></td>
                                        <td><h4>Rp. {{$transaksi->nominal_pembayaran}}</h4></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row py-2 mx-auto">
                            <div class="col-md-11"><h4>Daftar Belanjaan :</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table class="table table striped table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Produk</th>
                                                <th>Barcode</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @for($i = 0 ; $i < count($transaksi['transaksi']) ; $i++)
                                                <tr>
                                                    <td>{{$transaksi['transaksi'][$i]['produk']}}</td>
                                                    <td>{{$transaksi['transaksi'][$i]['barcode']}}</td>
                                                    <td>{{$transaksi['transaksi'][$i]['harga']}}</td>
                                                    <td>{{$transaksi['transaksi'][$i]['qty']}}</td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .my-custom-scrollbar {
        position: relative;
        max-height: 200px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }
</style>