<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class MasterBahan extends Model
{
    protected $collection = 'master_bahans';

    protected $fillable = [
        'nama_bahan', 'satuan',
    ];
}
