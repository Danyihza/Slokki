<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    public $primaryKey = 'id_transaksi';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_transaksi',
        'id_customer',
        'total_amount',
        'ongkir',
        'payment_method',
        'address',
        'bukti_pembayaran',
        'no_resi',
        'bukti_resi',
        'status',
        'tanggal_transaksi',
    ];

    protected $casts = [
        'status' => 'array',
    ];

    public static function generateTransactionId()
    {
        $lastId = self::orderBy('id_transaksi', 'desc')->first();

        if ($lastId) {
            $lastId = $lastId->id_transaksi;
            $lastId = substr($lastId, 3);
            $lastId = (int) $lastId;
            $lastId++;
            $lastId = str_pad($lastId, 7, '0', STR_PAD_LEFT);
            return 'TRX' . $lastId;
        }

        return 'TRX0000001';
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    // public function owner()
    // {
    //     return $this->belongsTo(Owner::class, 'id_owner', 'id_owner');
    // }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
