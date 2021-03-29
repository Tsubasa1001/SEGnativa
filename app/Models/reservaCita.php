<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservaCita extends Model
{
    use HasFactory;

    protected $table ='reservacitas';

    protected $fillable = [
        'id',
        'codigo',
        'hora',
        'fecha',
        'motivoConsulta',
        'estadoTratamiento',
        'created_at',
        'updated_at',
        'pacientes_id',
        'trabajadors_id'
    ];
}
