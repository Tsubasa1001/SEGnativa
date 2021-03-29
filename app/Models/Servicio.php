<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'precio',
        'id_equipamiento',
        'id_promocion',
        'created_at',
        'updated_at'
    ];
}
