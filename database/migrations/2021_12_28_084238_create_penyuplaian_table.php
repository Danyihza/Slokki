<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyuplaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyuplaian', function (Blueprint $table) {
            $table->string('id_penyuplaian', 100)->primary();
            $table->string('id_owner', 100);
            $table->foreign('id_owner')->references('id_owner')->on('owner');
            $table->string('id_supplier', 100);
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier');
            $table->dateTime('tanggal_penyuplaian');
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
        Schema::dropIfExists('penyuplaian');
    }
}
