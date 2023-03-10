<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table ='penjualan';
    protected $fillable =['id_pengguna','id_produk','jumlah','id_status','tanggal_pesanan','pengiriman','via','total_bayar'];
}
