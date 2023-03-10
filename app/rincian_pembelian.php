<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rincian_pembelian extends Model
{
    protected $table='rincian_pembelian';
    protected $fillable=['Id_bahan_baku','Id_pembelian','jumlah_pembelian','harga_pembelian'];
}
