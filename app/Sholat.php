<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sholat extends Model
{
    protected $table = 'sholats';

    protected $fillable = ['user_id',
                            'nama_sholat',
                            'jadwal_sholat',
                            'waktu_sholat',
                            'rating',
                            'vidio_sholat',
                        ];
}
