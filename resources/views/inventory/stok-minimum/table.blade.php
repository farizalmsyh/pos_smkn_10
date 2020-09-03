<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="card-title">
                    <div class="btn-group dropleft float-right">
                        <button class="btn btn-primary text-white py-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print"></i>&nbsp; Print PDF</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" disabled>Pilh Kategori</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('stok-minimum-print-all')}}">Semua Kategori</a>
                            @foreach(\App\Model\MasterKategori::select('_id', 'kategori')->get() as $value)
                            <a class="dropdown-item" href="{{route('stok-minimum-print-kategori', [$value->id])}}">{{$value->kategori}}</a>
                            @endforeach
                        </div>
                    </div>
                    <h5 class="pt-2"><i class="fas fa-users"></i>&nbsp;Daftar Produk Kosong / Habis</h5>
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
                             </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
