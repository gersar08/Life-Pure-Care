<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_code',
        'client_name',
        'unique_price',
        'contact_number',
        'email_contact',
    ];
    
    public function preciosEspeciales()
    {
        return $this->hasMany(PrecioEspecial::class, 'reference_code', 'reference_code');
    }
}
