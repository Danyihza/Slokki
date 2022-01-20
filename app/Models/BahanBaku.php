<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';
    public $primaryKey = 'id_bahan_baku';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_bahan_baku',
        'nama_bahan_baku',
        'harga_beli',
    ];


    public static function generateBahanBakuId()
    {
        $lastId = self::orderBy('id_bahan_baku', 'desc')->first();

        if ($lastId) {
            $lastId = $lastId->id_bahan_baku;
            $lastId = substr($lastId, 3);
            $lastId = (int) $lastId;
            $lastId++;
            $lastId = str_pad($lastId, 3, '0', STR_PAD_LEFT);
            return 'BBK' . $lastId;
        }

        return 'BBK001';
    }
}
