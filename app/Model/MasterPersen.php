<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class MasterPersen extends Model
{
    protected $collection = 'master_persens';

    protected $fillable = [
        'persen',
    ];
}
