<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'stok_bahan_baku';
    public $primaryKey = 'id_stok_bahan_baku';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_stok_bahan_baku',
        'bulan',
        'stok_awal',
        'stok_akhir'
    ];
}
