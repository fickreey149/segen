<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('harga_produk');
            $table->string('jumlah');
            $table->integer('produk_id')->unsigned();
            $table->integer('pembelian_id')->unsigned();
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
        Schema::dropIfExists('produk_pembelian');
    }
}
