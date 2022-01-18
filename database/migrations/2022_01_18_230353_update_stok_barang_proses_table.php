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
        Schema::table('stok_barang_proses', function (Blueprint $table) {
            $table->float('fermentasi_awal')->change();
            $table->float('fermentasi_akhir')->change();            
            $table->float('roasting_awal')->change();
            $table->float('roasting_akhir')->change();
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
