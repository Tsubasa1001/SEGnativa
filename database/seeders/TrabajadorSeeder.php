<?php

namespace Database\Seeders;

use App\Models\Trabajador;
use Illuminate\Database\Seeder;

class TrabajadorSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $cargos = (['Fisioterapeuta','Fisioterapeuta Senior','Fisioterapeuta Pediátrico (Intervención Temprana)','Fisioterapeuta (Tiempo Parcial)','Fisioterapeuta Colegiado)']);
        $ocupaciones = (['Cocinera', 'Secreatria', 'Jardinero', 'Guardia', 'Limpieza']);
        $carXocu = (['Ejecutivo', 'Obrero']);

        for ($pk=1; $pk <= 50; $pk++) {
            $trabajo = array_rand($carXocu);
            
            if ($trabajo == 0){
                Trabajador::factory()->create([
                    'id' => $pk,
                    'codigo' => 'NT'.$pk,
                    'especialidad' => 1,
                    'cargo' => $cargos[array_rand($cargos)],
                    'ocupacion' => 'NAN',
                    ]);
            }else{
                Trabajador::factory()->create([
                    'id' => $pk,
                    'codigo' => 'NT'.$pk,
                    'especialidad' => 2,
                    'cargo' => 'NAN',
                    'ocupacion' => $ocupaciones[array_rand($ocupaciones)],
                    ]);
            }
        }
    }
}
