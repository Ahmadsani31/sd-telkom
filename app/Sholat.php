<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sholat extends Model
{
    protected $table = 'sholats';

    protected $fillable = ['user_id',
                            'sholat',
                            'waktu_sholat',
                            'rating',
                            'image',
                        ];
}
