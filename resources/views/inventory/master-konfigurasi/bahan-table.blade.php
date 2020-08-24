<div class="row justify-content-center py-3">
    <div class="col-md-10">
    	<div class="card">
    		<div class="card-header bg-info text-white">Daftar Bahan</div>
    		<div class="card-body">
    			<div class="table-responsive">
		            <table id="data-tables-bahan" class="table table-striped table-bordered table-hover text-center" style="width: 100%;">
		                <thead class="text-center">
		                    <tr>
		                        <th>No</th>
		                        <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Option</th>
		                    </tr>
		                </thead>
		                <tbody>
                      @foreach($bahan as $key => $value)
		                    <tr>
		                    <td>{{$key+1}}</td>
		                    <td>{{$value->nama_bahan}}</td>
                            <td>{{$value->satuan}}</td>
                            <td><a href="{{route('delete-bahan', [$value->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
		                    </tr>
                      @endforeach
		                </tbody>
		            </table>
		        </div>
    		</div>
    		<div class="card-footer bg-info text-white">
    			<form method="POST" class="row justify-content-center" action="{{route('save-bahan')}}">
				@csrf
    				<div class="form-group col-md-5">
						<label>Nama</label>    
						<input name="nama_bahan" class="form-control" type="text"></input>
					</div>
					<div class="form-group col-md-5">
						<label>Satuan</label>    
						<input name="satuan" class="form-control" type="text"></input>
					</div>
					<div class="form-group col-md-10">
						<button type="submit" class="btn btn-block btn-success">Tambah Bahan</button>
					</div>
    			</form>
    		</div>	
    	</div>
    </div>
</div>
<script>
	$(document).ready(function() {
      $('#data-tables-bahan').DataTable();
    });
</script>