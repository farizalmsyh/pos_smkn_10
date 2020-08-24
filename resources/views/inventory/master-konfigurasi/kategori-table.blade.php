<div class="row justify-content-center py-3">
    <div class="col-md-10">
    	<div class="card">
    		<div class="card-header bg-info text-white">Daftar Kategori</div>
    		<div class="card-body">
    			<div class="table-responsive">
		            <table id="data-tables-kategori" class="table table-striped table-bordered table-hover text-center" style="width: 100%;">
		                <thead class="text-center">
		                    <tr>
		                        <th>No</th>
		                        <th>Kategori</th>
		                        <th>Option</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($kategori as $key => $value)
		                    <tr>
		                        <td>{{$key+1}}</td>
		                        <td>{{$value->kategori}}</td>
		                        <td><a href="{{route('delete-kategori', [$value->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
    		</div>
    		<div class="card-footer bg-info text-white">
    			<form method="POST" action="{{route('save-kategori')}}">
				@csrf
    				<div class="input-group">
  						<input type="text" name="kategori" class="form-control" placeholder="Tambah Kategori" aria-label="Tambah Kategori" aria-describedby="button-addon2">
  						<div class="input-group-append">
    						<button class="btn btn-success" type="submit" id="button-addon2">Save</button>
  						</div>
					</div>
    			</form>
    		</div>	
    	</div>
    </div>
</div>
<script>
	$(document).ready(function() {
      $('#data-tables-kategori').DataTable();
    });
</script>