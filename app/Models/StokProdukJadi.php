<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokProdukJadi extends Model
{
    use HasFactory;

    protected $table = 'stok_produk_jadi';
    public $primaryKey = 'id_stok_produk_jadi';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_stok_produk_jadi',
        'id_produk',
        'bulan',
        'stok_awal',
        'stok_akhir'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
