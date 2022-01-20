<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customer';
    public $primaryKey = 'id_customer';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_customer',
        'nama_customer',
        'alamat_customer',
        'no_telp',
        'email',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_customer', 'id_customer');
    }

    public static function generateCustomerId()
    {
        $lastId = self::orderBy('id_customer', 'desc')->first();

        if ($lastId) {
            $lastId = $lastId->id_customer;
            $lastId = substr($lastId, 3);
            $lastId = (int) $lastId;
            $lastId++;
            $lastId = str_pad($lastId, 3, '0', STR_PAD_LEFT);
            return 'CST' . $lastId;
        }

        return 'CST001';
    }
}
