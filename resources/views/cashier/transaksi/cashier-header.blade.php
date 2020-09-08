<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card bg-info">
            <div class="row text-white px-3 py-3">
                <div class="col-md-2">
                    <img src="{{url('img/profile-picture/'.Auth::user()->foto)}}" class="img-fluid"  alt="Profil picture">
                </div>
                <div class="col-md-5 my-auto">
                    <table class="text-white">
                        <tr>
                            <td><h5>Nama </h5></td>
                            <td><h5>&nbsp;:&nbsp;</h5></td>
                            <td><h5>{{Auth::user()->name}}</h5></td>
                        </tr>
                        <tr>
                            <td><h5>Tanggal </h5></td>
                            <td><h5>&nbsp;:&nbsp;</h5></td>
                            <td><h5>{{Carbon\Carbon::today()->locale('id')->isoFormat('dddd, DD MMMM YYYY')}}</h5></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5 my-auto">
                    <!-- <span>Total Belanja</span> -->
                    <div class="card bg-primary ">
                        <div style="height: 40px" class=" row mx-2 mt-1">                                
                            <h3>Rp. &nbsp;</h3>    
                            <h3>
                            @if(\App\Model\TransaksiSementara::count() != 0)
                                {{(\App\Model\TransaksiSementara::sum('subtotal'))}}
                            @else
                            00.00
                            @endif
                            </h3>
                        </div>
                    </div>
                        <form action="{{ route('transaksi-sementara-save')}}" method="POST" class="row" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group col-md-12 mt-1">
                                <div class="input-group">
                                    <select class="js-example-basic-single form-control" style="width: 100%" name="id_produk" required>
                                        @foreach(App\Model\Produk::all() as $value)
                                        <option value="{{$value->id}}">{{$value->nama}}</option>
                                        @endforeach
                                    </select>      
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <h3>Jumah :</h3>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="input-group input-group-sm">
                                    <input name="qty" type="text" value="1" class="form-control text-center">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <button class="btn btn-block btn-success" type="submit"><i class="fas fa-plus"></i></button>
                            </div>
                        </form>   
                        <!-- <input type="text" class="form-control" placeholder="Cari Barang" aria-label="Cari Barang" aria-describedby="button-addon2"> -->
                </div>
            </div>
        </div>
    </div>
</div>
