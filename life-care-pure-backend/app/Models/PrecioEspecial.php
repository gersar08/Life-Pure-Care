<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecioEspecial extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'producto_id',
        'precio_especial',
    ];
}
