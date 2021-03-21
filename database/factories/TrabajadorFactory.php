<?php

namespace Database\Factories;

use App\Models\Trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use Carbon\Carbon;

class TrabajadorFactory extends Factory{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trabajador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
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
            'nombre' => $this->faker->name,
            'nacionalidad' => 'Bolivia',
            'especialidad' => 1,
            'cargo' => 1,
            'ocupacion' => 1,
            'direccion' => $direccion[array_rand($direccion)],
            'email' => $this->faker->unique()->safeEmail,
            'celular' => $this->faker->numerify('7#######'),
            'edad' => $this->faker->numerify('##'),
            'genero' => $generos[array_rand($generos)],
            'created_at' => Carbon::parse(today())->format('Y-m-d'),
            'updated_at' => Carbon::parse(today())->format('Y-m-d')
        ];
    }
}
