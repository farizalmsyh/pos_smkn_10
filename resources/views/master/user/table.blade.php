<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="card-title">
                    <a href="{{route('create-user')}}" class="btn btn-success float-right text-white py-2" ><i class="fas fa-plus"></i></a>
                    <h5 class="pt-2"><i class="fas fa-users"></i>&nbsp;Daftar Data Pengguna</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-tables" class="table table-striped table-bordered table-hover" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Koperasi</th>
                                <th>Role</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key => $value)
                            <tr @if($value->id == Auth::user()->id) class="text-primary" @endif>
                                <td class="text-center">{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->kontak}}</td>
                                <td>{{\App\Model\Profil::where('_id', $value->id_koperasi)->value('nama_koperasi')}}</td>
                                <td class="text-capitalize">{{$value->hak_akses}}</td>
                                <td class="text-center text-white">
                                    @if($value->id != Auth::user()->id)
                                    <a href="{{route('delete-user', [$value->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    @endif
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
