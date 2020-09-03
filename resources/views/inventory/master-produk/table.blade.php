<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="card-title">
                    <a href="{{route('master-produk-create')}}" class="btn btn-success float-right text-white py-2" ><i class="fas fa-plus"></i></a>
                    <h5 class="pt-2"><i class="fas fa-users"></i>&nbsp;Daftar Produk</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-tables" class="table table-striped table-bordered table-hover" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Curr</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Unit</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($produk as $key => $value)
                             <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$value->barcode}}</td>
                                 <td>{{$value->nama}}</td>
                                 <td>{{$value->stok}}</td>
                                 <td>{{\App\Model\MasterCurr::where('_id', $value->curr)->value('curr')}}</td>
                                 <td>{{$value->harga_beli}}</td>
                                 <td>{{$value->harga_jual}}</td>
                                 <td>{{\App\Model\MasterUnit::where('_id', $value->unit)->value('unit')}}</td>
                                 <td>
                                    <a href="{{route('master-produk-add-stok', [$value->id])}}" class="btn-sm btn-success"><i class="fas fa-plus"></i></a>
                                    <a href="{{route('master-produk-edit', [$value->id])}}" class="btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('master-produk-delete', [$value->id])}}" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                             </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
