<div class="row justify-content-center py-3">
    <div class="col-md-10">
    	<div class="card">
    		<div class="card-header bg-info text-white">Daftar Currancy</div>
    		<div class="card-body">
    			<div class="table-responsive">
		            <table id="data-tables-curr" class="table table-striped table-bordered table-hover text-center" style="width: 100%;">
		                <thead>
		                    <tr>
		                        <th>No</th>
		                        <th>Curr</th>
		                        <th>Option</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($curr as $key => $value)
		                    <tr>
		                        <td>{{$key+1}}</td>
		                        <td>{{$value->curr}}</td>
		                        <td><a href="{{route('delete-curr', [$value->id])}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
    		</div>
    		<div class="card-footer bg-info text-white">
    			<form method="POST" action="{{route('save-curr')}}">
				@csrf
    				<div class="input-group">
  						<input name="curr" type="text" class="form-control" placeholder="Tambah Currancy" aria-label="Tambah Currancy" aria-describedby="button-addon2">
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
      $('#data-tables-curr').DataTable();
    });
</script>