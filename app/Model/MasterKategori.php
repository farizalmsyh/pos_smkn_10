<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class MasterKategori extends Model
{
    protected $collection = 'master_kategoris';

    protected $fillable = [
        'kategori',
    ];
}
