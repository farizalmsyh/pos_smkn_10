<div class="row justify-content-center py-3">
    <div class="col-md-10">
    	<div class="card">
    		<div class="card-header bg-info text-white">Daftar PPN</div>
    		<div class="card-body">
    			<label>Stok Minimum</label>
    			<form method="POST" action="{{route('save-or-update-ppn-stok')}}">
				@csrf
				@if(!empty($ppn->id))
				<input type="hidden" name="id" value="{{$ppn->id}}">
				@endif
	    			<div class="input-group mb-3">
						<input name="stok_minimum" type="number" class="form-control" placeholder="Stok Minimum" aria-label="Stok Minimum" aria-describedby="button-addon2" value="{{ !empty($ppn->stok_minimum) ? $ppn->stok_minimum : 0}}">
						<div class="input-group-append">
						    <button class="btn btn-outline-info" type="submit" id="button-addon2">Ubah</button>
						</div>
					</div>
    			</form>
    			<label>PPN</label>
    			<form method="POST" action="{{route('save-or-update-ppn')}}">
				@csrf
				@if(!empty($ppn->id))
				<input type="hidden" name="id" value="{{$ppn->id}}">
				@endif
	    			<div class="input-group mb-3">
						<input name="ppn" type="number" class="form-control" placeholder="Angka PPN" aria-label="Angka PPN" aria-describedby="button-addon2" value="{{ !empty($ppn->ppn) ? $ppn->ppn : 0}}">
						<div class="input-group-append">
						  	<span class="input-group-text">%</span>
						    <button class="btn btn-outline-info" type="submit" id="button-addon2">Ubah</button>
						</div>
					</div>
    			</form>
    		</div>
    	</div>
    </div>
</div>