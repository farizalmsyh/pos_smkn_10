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
	        							<button class="btn-lg btn-block btn-outline-info"><i class="fas fa-images"></i> Ubah Foto Profil</button>
	        						</div>
	        					</div>
	        					<div class="row justify-content-center py-3 pb-5">
	        						<div class="col item-align-center">
	        							<button class="btn-lg btn-block btn-outline-success"><i class="fas fa-user"></i> Ubah Data Profil</button>
	        						</div>
	        					</div>
	        					<div class="row justify-content-center pt-5 sticky-bottom">
	        						<div class="col item-align-center">
	        							<button class="btn-lg btn-block btn-outline-danger"><i class="fas fa-user-slash"></i> Hapus Akun Pengguna</button>
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