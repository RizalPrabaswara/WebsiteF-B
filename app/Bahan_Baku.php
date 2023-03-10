<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan_Baku extends Model
{
    function Detail_Bahan_Baku() {
        return $this->hasMany('App\Detail_Bahan_Baku');
    }
    protected $table='bahanbaku';
    protected $fillable=['ID_bahan_baku','Nama_bahan','stok','satuan','status'];
}

