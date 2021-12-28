<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->string('id_pengeluaran', 100)->primary();
            $table->string('id_owner', 100);
            $table->foreign('id_owner')->references('id_owner')->on('owner');
            $table->dateTime('tanggal_pengeluaran');
            $table->string('nama_pengeluaran', 100);
            $table->string('jenis_pengeluaran', 100);
            $table->integer('harga');
            $table->string('satuan', 100);
            $table->integer('jumlah_pengeluaran');
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
        Schema::dropIfExists('pengeluaran');
    }
}
