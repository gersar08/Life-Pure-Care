<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecioEspecial extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_code',
        'inventario_id',
        'precio',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'reference_code', 'reference_code');
    }

    public function inventario()
    {
        return $this->belongsTo(Inventory::class);
    }
}
