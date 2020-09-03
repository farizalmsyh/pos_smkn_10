@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
        	<div class="col-md-10">
	        	<div class="card">
	        		<div class="card-header bg-info text-white"><i class="fas fa-user-cog"></i> Pengaturan Profil</div>
	        		<div class="card-body">
	        			<div class="row justify-content-center">
	        				<div class="col-md-6">
	        					<img src="{{asset('img/profile-picture/'. Auth::user()->foto)}}" class="rounded mx-auto d-block" alt="...">
	        				</div>
	        				<div class="col-md-6">
	        					<div class="row justify-content-center py-3">
	        						<div class="col item-align-center">
										<button type="button" class="btn-lg btn-block btn-outline-info" data-toggle="modal" data-target="#modalUpdateFoto"><i class="fas fa-images"></i> Ubah Foto Profil</button>
	        						</div>
	        					</div>
	        					<div class="row justify-content-center py-3 pb-5">
	        						<div class="col item-align-center">
	        							<button type="button" class="btn-lg btn-block btn-outline-success" data-toggle="modal" data-target="#modalUpdateData"><i class="fas fa-user"></i> Ubah Data Profil</button>
	        						</div>
	        					</div>
	        					<div class="row justify-content-center pt-5 sticky-bottom">
	        						<div class="col item-align-center">
	        							<button type="button" class="btn-lg btn-block btn-outline-danger" data-toggle="modal" data-target="#modalDeleteData"><i class="fas fa-user-slash"></i> Hapus Akun Pengguna</button>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        	</div>
        </div>
    </div>
@endsection

<!-- Modal Update Foto -->
<div class="modal fade" id="modalUpdateFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white" id="exampleModalLongTitle"><i class="fas fa-images"></i> Ubah Foto Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  	<form action="{{route('setting-update-foto', [Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="modal-body">
			<div class="input-group my-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" name="foto" accept="image/*" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
    </div>
  </div>
</div>

<!-- Modal Update Data Profil -->
<div class="modal fade" id="modalUpdateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="exampleModalLongTitle"><i class="fas fa-user"></i> Ubah Data Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  	<form action="{{route('setting-update-data', [Auth::user()->id])}}" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="modal-body">
				<div class="row justify-content-center">
					<div class="form-group col-md-6" {{ $errors->has('name') ? 'has-error' : '' }}>
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
					<div class="form-group col-md-6">
						<label for="birth_date">Tanggal Lahir</label>
						<input type="date" name="birth_date" value="{{Auth::user()->birth_date}}" class="form-control">
					</div>
                    <div class="form-group col-md-6">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender">
                            <option disabled selected>Pilh Jenis Kelamin</option>
                            <option value="male" @if(Auth::user()->gender == 'male') selected @endif>Laki-Laki</option>
                            <option value="female" @if(Auth::user()->gender == 'female') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6" {{ $errors->has('phone') ? 'has-error' : '' }}>
                        <label for="kontak">No. Telpon</label>
                        <input class="form-control" type="tel" value="{{Auth::user()->kontak}}" name="kontak" pattern="[0]{1}[0-9]{11,14}" placeholder="Masukkan nomor telpon" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Masukan alamat anda" required>{{Auth::user()->alamat}}</textarea>
                    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
    </div>
  </div>
</div>

<!-- Modal Delete Data Profil -->
<div class="modal fade" id="modalDeleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLongTitle"><i class="fas fa-user-slash"></i> Hapus Akun Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
		<div class="modal-body">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<form id="delete-account-form" action="{{ route('setting-delete', [Auth::user()->id]) }}" method="POST">
					{{ csrf_field() }}
						<div class="form-group">
							<label for="">Yakin Ingin Menghapus Akun ? Ketik 'Confirm' untuk Korfirmasi Penghapusan Akun</label>
							<input type="password" name="confirm_password" class="form-control">
						</div>
						<button type="submit" class="btn btn-block btn-danger">Confirm</button>
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