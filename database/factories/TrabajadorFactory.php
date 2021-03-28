<?php

namespace Database\Factories;

use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use Carbon\Carbon;

class TrabajadorFactory extends Factory{
    protected $model = Trabajador::class;


    public function definition(){
        $nombre = $this->faker->name;
        $email = $this->faker->unique()->safeEmail;

        $generos = (['M', 'F']);
        $direccion = ([
            'C/ Muchiri #12',
            'C/ Taperas #88',
            'C/ Moritas #99',
            'C/ Jupiter #11',
            'C/ Saturno #88',
            'C/ Vitupue #98'
        ]);

        return [
            'id' => 1,
            'codigo' => '1',

            'ci' => $this->faker->unique()->numerify('#######'),
            'nombre' => $nombre,
            'nacionalidad' => 'Bolivia',
            'especialidad' => 1,
            'cargo' => 1,
            'ocupacion' => 1,
            'direccion' => $direccion[array_rand($direccion)],
            'email' => $email,
            'celular' => $this->faker->numerify('7#######'),
            'edad' => $this->faker->numerify('##'),
            'genero' => $generos[array_rand($generos)],
            'created_at' => Carbon::parse(today())->format('Y-m-d'),
            'updated_at' => Carbon::parse(today())->format('Y-m-d')
        ];
    }
}
