<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
  protected $table='pelanggan';
  protected $fillable=['Nama_pelanggan','password','jenis_kelamin','no_telp','alamat'];
}
