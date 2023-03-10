<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RincianPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_pembelian', function (Blueprint $table) {
            $table->increments('Id_rincian_pembelian');
            $table->unsignedInteger('Id_bahan_baku');
            $table->unsignedInteger('Id_supplier');
            $table->unsignedInteger('Id_pembelian');
            $table->integer('jumlah_beli');
            $table->integer('harga_beli');
            $table->integer('total_pengeluaran');
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
