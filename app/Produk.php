<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    function Detail_Bahan_Baku() {
        return $this->hasMany('App/Detail_Bahan_Baku');
    }

    protected $table='produk';
    protected $fillable=['Id_produk','Nama_produk','Harga_jual','Deskripsi_produk','foto_produk','status'];
}
