<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_bahan_baku extends Model
{
    protected $table='detail_bahan_baku';
    protected $fillable =['produk_ID','bahan_baku_ID','jumlah_pakai'];
    public $timestamps = false;
}
