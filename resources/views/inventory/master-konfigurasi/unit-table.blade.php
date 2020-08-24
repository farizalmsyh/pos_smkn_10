<div class="row justify-content-center py-3">
    <div class="col-md-10">
    	<div class="card">
    		<div class="card-header bg-info text-white">Daftar Unit</div>
    		<div class="card-body">
    			<div class="table-responsive">
		            <table id="data-tables-unit" class="table table-striped table-bordered table-hover text-center" style="width: 100%;">
		                <thead class="text-center">
		                    <tr>
		                        <th>No</th>
		                        <th>Unit</th>
		                        <th>Option</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($unit as $key => $value)
		                    <tr>
		                        <td>{{$key+1}}</td>
		                        <td>{{$value->unit}}</td>
		                        <td><a href="{{route('delete-unit', [$value->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
    		</div>
    		<div class="card-footer bg-info text-white">
    			<form method="POST" action="{{route('save-unit')}}">
				@csrf
    				<div class="input-group">
  						<input name="unit" type="text" class="form-control" placeholder="Tambah Unit" aria-label="Tambah Unit" aria-describedby="button-addon2">
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
      $('#data-tables-unit').DataTable();
    });
</script>