<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBarangProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barang_proses', function (Blueprint $table) {
            $table->string('id_stok_barang_proses', 100)->primary();
            $table->date('bulan');
            $table->integer('fermentasi_awal');
            $table->integer('fermentasi_akhir');            
            $table->integer('stok_awal');
            $table->integer('stok_akhir');
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
        Schema::dropIfExists('stok_barang_proses');
    }
}
