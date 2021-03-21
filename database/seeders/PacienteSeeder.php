<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for ($pk=1; $pk <= 50; $pk++) {
            Paciente::factory()->create([
                'id' => $pk,
                'codigo' => 'NT'.$pk,
                'especialidad' => 0,
                ]);
        }
    }
}
