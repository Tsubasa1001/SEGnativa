<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model{
    use HasFactory;

    protected $fillable = [
        'id',
        'codigo',
        'ci',
        'nombre',
        'nacionalidad',
        'especialidad',
        'direccion',
        'email',
        'celular',
        'edad',
        'genero',
        'created_at',
        'updated_at'
    ];
}
