<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model{
    use HasFactory;

    protected $fillable = [
        'id',
        'codigo',
        'ci',
        'nombre',
        'nacionalidad',
        'especialidad',
        'cargo',
        'ocupacion',
        'direccion',
        'email',
        'celular',
        'edad',
        'genero',
        'created_at',
        'updated_at'
    ];
}
