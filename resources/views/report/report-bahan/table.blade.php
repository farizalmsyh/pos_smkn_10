<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="card-title">
                    <div class="btn-group dropleft float-right">
                        <button class="btn btn-primary text-white py-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print"></i>&nbsp; Print PDF</button>
                        <a href="{{route('report-bahan-create')}}" class="btn btn-success ml-3"><i class="fas fa-plus"></i></a>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" disabled>Pilh Data Print</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('report-bahan-print-all')}}">Semua Data</a>
                            <a class="dropdown-item" href="{{route('report-bahan-print-today')}}">Hari Ini</a>
                            <button class="dropdown-item" data-toggle="modal" data-target="#modalRangeDate">Date Range</button>
                        </div>
                    </div>
                    <h5 class="pt-2"><i class="fas fa-archive"></i>&nbsp;Data Bahan</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-tables" class="table table-striped table-bordered table-hover" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Bahan</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Tanggal Dibuat</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($reportbahan as $key => $value)
                            <tr class="text-center">
                                <td>{{$key+1}}</td>
                                <td>{{App\Model\MasterBahan::where('_id', $value->nama_bahan)->value('nama_bahan')}}</td>
                                <td>{{$value->jumlah}}</td>
                                <td>{{$value->satuan}}</td>
                                <td>{{Carbon\Carbon::parse($value->created_at)->locale('id')->isoFormat('Do MMMM YYYY')}}</td>
                                <td><a href="{{route('report-bahan-delete', [$value->id])}}" class="btn-sm btn-danger"><i class="fas fa-trash"></i> </a> </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Date Range Print -->
<div class="modal fade" id="modalRangeDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLongTitle"><i class="fas fa-calendar"></i> Range Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
		<div class="modal-body">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<form class="row" id="delete-account-form" action="{{ route('report-bahan-print-date') }}" method="POST">
					{{ csrf_field() }}
						<div class="form-group col-md-6">
                            <label for="date_from">Dari</label>
                            <input name="date_from" type="date" class="form-control">
						</div>
						<div class="form-group col-md-6">
                            <label for="date-to">Sampai</label>
                            <input name="date_to" type="date" class="form-control">
						</div>
                        <button type="submit" class="btn btn-block btn-primary"><i class="far fa-file-pdf"></i> Print PDF</button>
					</form>
				</div>
			</div>		
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
    </div>
  </div>
</div>