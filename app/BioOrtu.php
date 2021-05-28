<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BioOrtu extends Model
{
    // protected $guard = 'ortu';

    protected $table = 'bio_ortus';

    protected $guarded =[];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function siswa()
    {
        return $this->hasOne(User::class,'id','siswa_id');
    }
}
