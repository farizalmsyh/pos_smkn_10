@extends('cashier.layouts.cashier')

@section('content')
    <div class="container-fluid">
        @include('cashier.transaksi.cashier-header')
        @include('cashier.transaksi.cashier-body')
        @include('cashier.transaksi.cashier-footer')
    </div>
@endsection
@include('cashier.transaksi.script')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{route('transaksi-detail-save')}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12"><h3>Total Belanja</h3></div>
            <div class="col-md-12"><h3 class="text-right text-danger">Rp. {{\App\Model\TransaksiSementara::sum('subtotal')}}</h3></div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="nominal_pembayaran">Nominal Pembayaran :</label>
                <input type="number" class="form-control" name="nominal_pembayaran" required>
            </div>
        </div>
      </div>
      <div class="modal-footer bg-success">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Bayar</button>
      </div>
    </div>
  </div>
        </form>
</div>