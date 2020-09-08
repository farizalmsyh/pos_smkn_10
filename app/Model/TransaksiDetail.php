<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $collection = 'transaksi_details';

    protected $fillable = [
        'produk', 'qty', 'harga', 'sub_total', 'barcode', 'no_ref', 'kasir', 'tanggal',
    ];
}
