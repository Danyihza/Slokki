<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table ="pengeluaran";
    public $primaryKey ="id_pengeluaran";
    public $keyType = "string";

    protected $fillable = [
        'id_pengeluaran',
        'id_owner',
        'tanggal_pengeluaran',
        'nama_pengeluaran',
        'jenis_pengeluaran',
        'harga',
        'satuan',
        'jumlah_pengeluaran'
    ];
}
