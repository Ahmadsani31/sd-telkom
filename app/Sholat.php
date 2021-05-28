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
                            'vidio_sholat',
                            'emotion',
                            'status',
                        ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
