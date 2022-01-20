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

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'id_owner', 'id_owner');
    }

    public static function generatePengeluaranId()
    {
        $lastId = self::orderBy('id_pengeluaran', 'desc')->first();

        if ($lastId) {
            $lastId = $lastId->id_pengeluaran;
            $lastId = substr($lastId, 3);
            $lastId = (int) $lastId;
            $lastId++;
            $lastId = str_pad($lastId, 3, '0', STR_PAD_LEFT);
            return 'PGL' . $lastId;
        }

        return 'PGL001';
    }
}
