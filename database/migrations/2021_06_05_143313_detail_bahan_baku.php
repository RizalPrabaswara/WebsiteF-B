<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailBahanBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bahan_baku', function (Blueprint $table) {
            $table->bigIncrements('Id_detail');
            $table->integer('produk_ID');
            $table->integer('bahan_baku_ID');
            $table->double('jumlah_pakai'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('detail_bahan_baku');
        Schema::enableForeignKeyConstraints();
    }
}
