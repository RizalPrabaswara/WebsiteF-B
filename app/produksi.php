<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    protected $table = 'produksi';
    protected $fillable= ['id_bahan_baku','nama_produksi','jumlah_produksi','biaya_produksi','tgl_produksi'];
}
