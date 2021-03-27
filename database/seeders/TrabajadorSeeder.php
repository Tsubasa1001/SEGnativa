<?php

namespace Database\Seeders;

use App\Models\Trabajador;
use App\Models\User;
use Illuminate\Database\Seeder;

class TrabajadorSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $cargos = ([
            'Fisioterapeuta Inicial',
            'Fisioterapeuta Segundo',
            'Fisioterapeuta Primero',
            'Fisioterapeuta Master',
            'Fisioterapeuta Pediátrico'
        ]);
        $ocupaciones = ([
            'Cocinera',
            'Secretaria',
            'Jardinero',
            'Guardia',
            'Limpieza'
        ]);
        $carXocu = (['Ejecutivo', 'Obrero']);

        for ($pk=1; $pk <= 10; $pk++) {
            $trabajo = array_rand($carXocu);
            $tipo_patra = 2;

            $objeto = Trabajador::factory();
            $item = $objeto->raw();

            $name = $item['nombre'];
            $mail = $item['email'];

            if ($trabajo == 0){
                $objeto->create([
                    'id' => $pk,
                    'codigo' => 'NTR'.$pk,
                    'nombre' => $name,
                    'email' => $mail,
                    'especialidad' => 1,
                    'cargo' => $cargos[array_rand($cargos)],
                    'ocupacion' => 'NAN'
                ]);

                $pk_user = User::all();
                $pk_user = $pk_user->count()+1;
                $objeto2 = User::factory();
                $objeto2->create([
                    'id' => $pk_user,
                    'name' => $name,
                    'email' => $mail,
                    'privilegio' => 2,
                    'tipo_patra' => $tipo_patra,
                    'id_patra' => $pk
                ]);
            }else{
                $objeto->create([
                    'id' => $pk,
                    'codigo' => 'NTR'.$pk,
                    'nombre' => $name,
                    'email' => $mail,
                    'especialidad' => 1,
                    'cargo' => 'NAN',
                    'ocupacion' => $ocupaciones[array_rand($ocupaciones)]
                ]);

                $pk_user = User::all();
                $pk_user = $pk_user->count()+1;
                $objeto2 = User::factory();
                $objeto2->create([
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
}
