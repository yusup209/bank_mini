<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    public function kelas(){
        return $this->belongsTo('\App\Kelas','id_kelas','id');
    }
}
