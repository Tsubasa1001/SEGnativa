<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\User;
use Facade\Ignition\Support\FakeComposer;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for ($pk=1; $pk <= 5000; $pk++) {
            $tipo_patra = 1;

            $objeto = Paciente::factory();
            $item = $objeto->raw();

            $name = $item['nombre'];
            $mail = $item['email'];

            $objeto->create([
                'id' => $pk,
                'codigo' => 'NPA'.$pk,
                'nombre' => $name,
                'email' => $mail,
                'especialidad' => 1
            ]);

            $pk_user = User::all();
            $pk_user = $pk_user->count()+1;
            $objeto = User::factory();

            $objeto->create([
                'id' => $pk_user,
                'name' => $name,
                'email' => $mail,
                'privilegio' => 3,
                'tipo_patra' => $tipo_patra,
                'id_patra' => $pk
            ]);
        }
    }
}
