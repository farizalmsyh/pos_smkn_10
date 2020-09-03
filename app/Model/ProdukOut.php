<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class ProdukOut extends Model
{
    protected $collection = 'produk_outs';

    protected $fillable = [
        'barcode', 'nama', 'jumlah', 'tanggal', 'id_koperasi', 'type_keluar', 'kode_type', 'kasir', 'sub_harga',
    ];
}
