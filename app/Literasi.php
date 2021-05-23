<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Literasi extends Model
{
    protected $table = 'literasis';

    protected $fillable = ['user_id',
                            'nama_buku',
                            'halaman',
                            'paragraf_awal',
                            'paragraf_akhir',
                            'vidio',
                        ];
}
