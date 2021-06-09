<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;

    protected $fillable = [
        'Titulo',
        'Provincia',
        'Ciudad',
        'TipoContrato',
        'Salario',
        'Descripcion',
        'URL',
    ];

    
}
