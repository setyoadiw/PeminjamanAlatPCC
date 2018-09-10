<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    //
    public function peminjamans(){
        return $this->hasMany('App\Peminjaman');
    }
}
