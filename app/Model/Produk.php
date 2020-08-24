<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Produk extends Model
{
    protected $collection = 'produks';

    protected $fillable = [
        'nama', 'unit', 'curr', 'harga_jual', 'harga_beli', 'disc', 'stok', 'barcode', 'status', 'expired', 'print_label', 'ganti_harga', 'kategori', 'keterangan', 'untung',
    ];
}
