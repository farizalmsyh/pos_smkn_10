<?php

namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Profil extends Model
{
    protected $collection = 'profils';

    protected $fillable = [
        'nama_koperasi', 'telepon', 'kode_pos', 'keterangan', 'alamat_koperasi', 'foto',
    ];
}
