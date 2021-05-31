<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $fillable = [
        'Localidad',
        'Titulo',
        'Metros',
        'Precio',
        'Habitaciones',
        'Baños',
        'Telefono',
        'Descripcion',
        'Url',
    ];
}
