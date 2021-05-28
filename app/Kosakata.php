<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kosakata extends Model
{
      protected $table = 'kosakatas';

    protected $fillable = ['user_id',
                            'bahasa',
                            'arti',
                            'vidio',
                            'status',
                            'emotion',
                        ];
}
