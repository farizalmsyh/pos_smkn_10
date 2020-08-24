<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="card-title">
                    <a href="{{route('create-profil')}}" class="btn btn-success float-right text-white py-2" ><i class="fas fa-plus"></i></a>
                    <h5 class="pt-2"><i class="fas fa-users"></i>&nbsp;Daftar Data Pengguna</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-tables" class="table table-striped table-bordered table-hover" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Instansi</th>
                                <th>No. Telp</th>
                                <th>Kode POS</th>
                                <th>Deskripsi</th>
                                <th>Alamat</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profil as $key => $value)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td>{{$value->nama_koperasi}}</td>
                                <td>{{$value->telepon}}</td>
                                <td>{{$value->kode_pos}}</td>
                                <td>{{$value->keterangan}}</td>
                                <td>{{$value->alamat_koperasi}}</td>
                                <td class="text-center text-white">
                                    <a href="{{route('delete-profil', [$value->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <a href="{{route('edit-profil', [$value->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
