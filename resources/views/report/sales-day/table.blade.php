<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="card-title">
                    <div class="btn-group dropleft float-right">
                        <button class="btn btn-primary text-white py-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-print"></i>&nbsp; Print PDF</button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" disabled>Pilh Data Print</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('sales-day-print-all')}}">Semua Data</a>
                            <a class="dropdown-item" href="{{route('sales-day-print-today')}}">Hari Ini</a>
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
                                <th>Kasir</th>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                                <th>Nominal Pembayaran</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($transaksi as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{\App\User::where('_id', $value->kasir)->value('name')}}</td>
                                <td>{{Carbon\Carbon::parse($value->tanggal)->locale('id')->isoFormat('dddd, DD MMMM YYYY')}}</td>
                                <td>Rp. {{$value->subharga}}</td>
                                <td>Rp. {{$value->nominal_pembayaran}}</td>
                                <td><a href="{{route('sales-day-detail', [$value->id])}}" class="btn btn-sm btn-info"><i class="fas fa-file"></i> </a></td>
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
					<form class="row" id="delete-account-form" action="{{ route('sales-day-print-date') }}" method="POST">
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