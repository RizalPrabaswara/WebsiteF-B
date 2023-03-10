<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BahanBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahanbaku', function (Blueprint $table) {
            $table->increments('Id_bahan_baku');
            // $table->unsignedBigInteger('Id_produk');
            $table->string('Nama_bahan', 50);
            $table->integer('stok');
            $table->string('satuan', 30);
            $table->date('kadaluarsa');
            $table->string('status',10);
            $table->timestamps();

            // $table->foreign('Id_produk')->references('Id_produk')->on('produk');
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
        Schema::dropIfExists('bahanbaku');
        Schema::enableForeignKeyConstraints();
    }
}
