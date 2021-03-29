<?php

namespace Database\Factories;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory{
    protected $model = Paciente::class;

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

        $fecha = $this->faker->dateTimeBetween('-1 years', 'now', null);

        return [
            'id' => 1,
            'codigo' => '1',

            'ci' => $this->faker->unique()->numerify('#######'),
            'nombre' => $nombre,
            'nacionalidad' => 'Bolivia',
            'especialidad' => 1,
            'direccion' => $direccion[array_rand($direccion)],
            'email' => $email,
            'celular' => $this->faker->numerify('7#######'),
            'edad' => $this->faker->numerify('##'),
            'genero' => $generos[array_rand($generos)],
            'created_at' => $fecha,
            'updated_at' => $fecha,
        ];
    }
}
