<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class MasterUnit extends Model
{
    protected $collection = 'master_units';

    protected $fillable = [
        'unit',
    ];
}
