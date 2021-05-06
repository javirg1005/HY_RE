<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $fillable = [
        'Titulo',
        'Habitaciones',
        'AoC',
        'precio',
        'm2',
        'descripcion',
        'localizacion',
        'caracteristicas',
        'URL',
    ];
}
