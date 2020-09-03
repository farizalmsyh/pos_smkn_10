<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class ReportBahan extends Model
{
    protected $collection = 'report_bahans';

    protected $fillable = [
        'nama_bahan', 'satuan', 'jumlah',
    ];
}
