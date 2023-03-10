<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rincian_penjualan extends Model
{
 protected $table='rincian_penjualan';
 protected $fillable=['Id_penjualan','Id_produk','jumlah'];
}
