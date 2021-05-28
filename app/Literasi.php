<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Literasi extends Model
{
    protected $table = 'literasis';

    protected $fillable = ['user_id',
                            'nama_buku',
                            'halaman',
                            'jumlah_paragraf',
                            'vidio',
                            'emotion',
                            'status',
                        ];
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
