<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokProdukJadiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_produk_jadi', function (Blueprint $table) {
            $table->string('id_stok_produk_jadi', 100)->primary();
            $table->date('bulan');
            $table->string('id_produk', 100);
            $table->foreign('id_produk')->references('id_produk')->on('produk');
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
        Schema::dropIfExists('stok_produk_jadi');
    }
}
