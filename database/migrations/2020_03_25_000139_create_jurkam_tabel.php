<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurkamTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurkam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jurkam', 20);
            $table->string('nik');
            $table->string('alamat', 70);
            $table->string('gender');
            $table->string('no_hp');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('kategori', ['fotografi', 'vidiografi']);
            $table->string('foto')->nullable();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('jurkam');
    }
}
