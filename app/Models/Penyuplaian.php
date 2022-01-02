<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyuplaian extends Model
{
    use HasFactory;

    protected $table = 'penyuplaian';
    public $primaryKey = 'id_penyuplaian';
    public $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_penyuplaian',
        'id_owner',
        'id_supplier',
        'tanngal_penyuplaian'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'id_owner', 'id_owner');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }
}
