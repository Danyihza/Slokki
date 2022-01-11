<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $table ="owner";
    public $primaryKey ="id_owner";
    public $keyType = "string";

    protected $fillable = [
        'id_owner',
        'nama_owner',
        'username',
        'password',
    ];

    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class, 'id_owner', 'id_owner');
    // }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_owner', 'id_owner');
    }


}
