<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="card bg-success">
            <div class="card-body ">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table bg-white mx-auto table-striped table-hover mb-0">
                        <thead class="text-center thead-light">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Sub Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($transaksi_sementara as $key =>$value)
                            <tr id="row_{{$value->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$value->produk}}</td>
                                <td>{{$value->qty}}</td>
                                <td>Rp. {{$value->harga}}</td>
                                <td>Rp. {{$value->subtotal}}</td>
                                <td><a href="{{route('transaksi-sementara-delete', [$value->id])}}"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>                
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .my-custom-scrollbar {
        position: relative;
        height: 200px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }
</style>