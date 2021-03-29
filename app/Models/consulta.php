<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'horaentrada',
        'horasalida',
        'precio',
        'nota',
        'diagnosticofinal',
        'created_at',
        'updated_at',
        'reservaCitas_id',
        'servicios_id'
    ];
}
