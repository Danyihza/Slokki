<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStokBarangProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('stok_barang_proses');
        Schema::create('stok_barang_proses', function (Blueprint $table) {
            $table->string('id_stok_barang_proses', 100)->primary();
            $table->date('bulan');
            $table->double('fermentasi_awal');
            $table->double('fermentasi_akhir');            
            $table->double('roasting_awal');
            $table->double('roasting_akhir');
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
