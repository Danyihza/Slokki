<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenyuplaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penyuplaian', function (Blueprint $table) {
            $table->string('id_detail_penyuplaian', 100)->primary();
            $table->string('id_penyuplaian', 100);
            $table->foreign('id_penyuplaian')->references('id_penyuplaian')->on('penyuplaian');
            $table->string('id_bahan_baku', 100);
            $table->foreign('id_bahan_baku')->references('id_bahan_baku')->on('bahan_baku');
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
        Schema::dropIfExists('detail_penyuplaian');
    }
}
