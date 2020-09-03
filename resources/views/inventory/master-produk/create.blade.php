@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('master-produk-save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header bg-success text-white">Tambah Data Produk</div>
                        <div class="card-body row">        
                            <div class="form-group col-md-6">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Produk" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="barcode">Barcode Produk</label>
                                <input type="number" class="form-control" name="barcode" placeholder="Masukkan Barcode" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga_beli">Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="Number" name="harga_beli" id="harga_beli" class="form-control harga_beli" placeholder="Masukkan Harga Beli" aria-label="Harga Beli" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga_jual">Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="number" name="harga_jual" id="harga_jual" class="form-control harga_jual" placeholder="Masukkan Harga Jual" aria-label="Harga Beli" aria-describedby="basic-addon1" disabled required>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">10 %</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" placeholder="Masukkan Stok" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach(\App\Model\MasterKategori::select('id', 'kategori')->get() as $key => $value)
                                    <option value="{{$value->id}}">{{$value->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="curr">Currancy</label>
                                <select name="curr" class="form-control" required>
                                    <option selected disabled>Pilih Currancy</option>
                                    @foreach(\App\Model\MasterCurr::select('id', 'curr')->get() as $key => $value)
                                    <option value="{{$value->id}}">{{$value->curr}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="unit">Unit</label>
                                <select name="unit" class="form-control" required>
                                    <option selected disabled>Pilih Unit</option>
                                    @foreach(\App\Model\MasterUnit::select('id', 'unit')->get() as $key => $value)
                                    <option value="{{$value->id}}">{{$value->unit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="expired">Expired</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check-exp">
                                        </div>
                                    </div>
                                    <input type="date" name="expired" class="form-control" aria-label="Text input with checkbox"  id="expired" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="disc">Discount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" id="check-disc">
                                        </div>
                                    </div>
                                    <input type="text" name="disc" class="form-control" aria-label="Text input with checkbox" id="disc" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="{{route('master-produk')}}" class="btn btn-secondary" >Close</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){
        $('.harga_beli').change(function() {
            var discount = $(this).val() * 0.10;
            var result = parseFloat($(this).val()) + parseFloat(discount);
            $('.harga_jual').val(result);
        });
    });
</script>
<script>
    $(document).ready(function(){
		$("#check-exp").click(function(){
            if($(this).prop("checked") == true){
                $('#expired').prop("disabled", false);
                $('#expired').prop("required", true);
            }
            else if($(this).prop("checked") == false){
                $('#expired').prop("disabled", true);
                $('#expired').prop("required", false);
                $('#expired').val('');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
		$("#check-disc").click(function(){
            if($(this).prop("checked") == true){
                $('#disc').prop("disabled", false);
                $('#disc').prop("required", true);
            }
            else if($(this).prop("checked") == false){
                $('#disc').prop("disabled", true);
                $('#disc').prop("required", false);
                $('#disc').val('');
            }
        });
    });
</script>