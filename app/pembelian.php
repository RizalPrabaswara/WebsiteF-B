<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    protected $table='pembelian';
    protected $fillable =['id_supplier','tanggal_pembelian'];
}
