@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    	@include('inventory.master-konfigurasi.curr-table')
    	<hr>
    	@include('inventory.master-konfigurasi.kategori-table')
    	<hr>
    	@include('inventory.master-konfigurasi.unit-table')
    	<hr>
    	@include('inventory.master-konfigurasi.persen-table')
    	<hr>
    	@include('inventory.master-konfigurasi.ppn-table')
    	<hr>
    	@include('inventory.master-konfigurasi.bahan-table')
    </div>
@endsection
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>