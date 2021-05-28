<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mengaji extends Model
{
    protected $table = 'mengajis';

    protected $fillable = ['user_id',
                            'surat',
                            'nama_surat',
                            'ayat_awal',
                            'ayat_akhir',
                            'vidio_ngaji',
                            'status',
                        ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
