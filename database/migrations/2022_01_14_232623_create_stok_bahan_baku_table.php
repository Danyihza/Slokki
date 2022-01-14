<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_bahan_baku', function (Blueprint $table) {
            $table->string('id_stok_bahan_baku', 100)->primary();
            $table->date('bulan');
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
        Schema::dropIfExists('stok_bahan_baku');
    }
}
