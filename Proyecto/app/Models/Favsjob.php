<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favsjob extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id_usu',
        'Id_job',
    ];
}
