<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BioSiswa extends Model
{
    // protected $guard = 'siswa';

    protected $table = 'bio_siswas';

    protected $guarded =[];

    public function siswa()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
