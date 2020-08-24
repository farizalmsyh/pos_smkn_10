<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class MasterPpn extends Model
{
    protected $collection = 'master_ppns';

    protected $fillable = [
        'ppn',
    ];
}
