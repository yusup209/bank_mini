<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function account_sender(){
        return $this->belongsTo('\App\Nasabah','id_pengirim','id');
    }

    public function account_receiver(){
        return $this->belongsTo('\App\Nasabah','id_penerima','id');
    }

    public function nasabah(){
        return $this->belongsTo('\App\Nasabah', 'id_pengirim', 'id');
    }
}
