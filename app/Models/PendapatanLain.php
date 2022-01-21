<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendapatanLain extends Model
{
    use HasFactory;

    protected $table ="pendapatan_lain";
    public $primaryKey ="id_pendapatan";
    public $keyType = "string";

    protected $fillable = [
        'id_pendapatan',
        'bulan',
        'nama_pendapatan',
        'jumlah'
    ];
}
