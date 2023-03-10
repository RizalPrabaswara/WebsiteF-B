<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('Id_penjualan');
            $table->unsignedInteger('id_pengguna');
            $table->unsignedInteger('id_produk');
            $table->unsignedInteger('id_status');
            $table->integer('jumlah');
            $table->date('tanggal_pesanan');
            $table->string('via',50);
            $table->string('pengiriman',50);
            $table->integer('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
