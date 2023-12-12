<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;


class RegistroVentasDaily extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fardos_in',
        'garrafas_in',
        'pet_in',
        'fardos_out',
        'garrafas_out',
        'pet_out',
        'total'
    ];
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id', 'unique_id');
    }
}
