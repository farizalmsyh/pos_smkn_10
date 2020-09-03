<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class ProdukIn extends Model
{
    protected $collection = 'produk_ins';

    protected $fillable = [
        'barcode', 'nama', 'jumlah', 'tanggal', 'id_koperasi', 'type_masuk', 'pj', 'sub_harga',
    ];
}
