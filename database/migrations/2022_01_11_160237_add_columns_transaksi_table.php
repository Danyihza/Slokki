<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->after('address')->nullable();
            $table->string('no_resi')->after('bukti_pembayaran')->nullable();
            $table->string('bukti_resi')->after('no_resi')->nullable();
            $table->text('status')->after('bukti_resi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('bukti_pembayaran');
            $table->dropColumn('no_resi');
            $table->dropColumn('bukti_resi');
            $table->dropColumn('status');
        });
    }
}
