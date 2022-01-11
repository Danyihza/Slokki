<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $primaryKey = 'id_produk';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_produk',
        'nama_produk',
        'jenis_produk',
        'harga_jual',
        'gambar'
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_produk', 'id_produk');
    }

    public static function generateIdProduk()
    {
        $lastId = Produk::orderBy('id_produk', 'desc')->first();
        if ($lastId == null) {
            return 'PRD0000001';
        } else {
            $lastId = $lastId->id_produk;
            $lastId = substr($lastId, 3);
            $lastId = (int) $lastId;
            $lastId++;
            $lastId = str_pad($lastId, 7, '0', STR_PAD_LEFT);
            return 'PRD' . $lastId;
        }
    }
}
