<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class MasterCurr extends Model
{
    protected $collection = 'master_currs';

    protected $fillable = [
      	'curr',
    ];
}
