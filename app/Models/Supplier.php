<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    public $primaryKey = 'id_supplier';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_supplier',
        'nama_supplier',
        'alamat_supplier'
    ];

    public static function generateSupplierId()
    {
        $lastId = self::orderBy('id_supplier', 'desc')->first();

        if ($lastId) {
            $lastId = $lastId->id_supplier;
            $lastId = substr($lastId, 3);
            $lastId = (int) $lastId;
            $lastId++;
            $lastId = str_pad($lastId, 3, '0', STR_PAD_LEFT);
            return 'SPL' . $lastId;
        }

        return 'SPL001';
    }
}
