<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarangProses extends Model
{
    use HasFactory;

    protected $table = 'stok_barang_proses';
    public $primaryKey = 'id_stok_barang_proses';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_stok_barang_proses',
        'bulan',
        'fermentasi_awal',
        'fermentasi_akhir',
        'roasting_awal',
        'roasting_akhir'
    ];
}
