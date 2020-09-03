<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="col-md-10">
                        <div class="bg-info text-white">
                            <h4 class="text-center text-white pt-5">POS SMKN NEGERI 10 JAKARTA</h3>
                            <p class="text-center text-white pt-1">Jl. Mayjen Sutoyo, RT.2/RW.9, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630</p>
                        </div>
                        <h5 class="text-center pt-4">Laporan Stok Minimum / Habis Kategori {{$kategori}}</h2>
                        <p class="text-left pt-3">Tanggal : {{\Carbon\Carbon::now()->locale('id')->isoFormat('dddd, Do MMMM YYYY')}}</h5>
                        <p class="text-left pb-1">Dicetak Oleh : {{Auth::user()->name}}</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="bg-info text-white text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Stok</th>
                                    <th>Keterangan Produk</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produk as $key => $value)
                                <tr class="text-center">
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->stok}}</td>
                                    <td>{{$value->keterangan}}</td>
                                    <td>{{\App\Model\MasterKategori::where('_id', $value->kategori)->value('kategori')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>