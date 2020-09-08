<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class TransaksiSementara extends Model
{
    protected $collection = 'transaksi_sementaras';

    protected $fillable = [
        'produk', 'qty', 'harga', 'sub_total', 'barcode', 'no_ref',
    ];
}
