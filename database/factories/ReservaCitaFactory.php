<?php

namespace Database\Factories;

use App\Models\reservaCita;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaCitaFactory extends Factory
{
    
    protected $model = reservaCita::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hora = ([
            '14:30:00',
            '09:00:00',
            '10:30:00',
            '15:00:00',
            '16:30:00',
            '08:30:00',
            '11:00:00'
        ]);
        
        $fecha = ([
            '2021-03-30',
            '2021-03-31',
            '2021-04-05',
            '2021-04-06',
            '2021-04-10',
            '2021-04-02',
            '2021-05-12'
        ]);

        $hora = ([
            '14:30:00',
            '09:00:00',
            '10:30:00',
            '15:00:00',
            '16:30:00',
            '08:30:00',
            '11:00:00'
        ]);

        $motivoConsulta = ([
            'Dolor espalda',
            'Dolor de cuello',
            'Estress',
            'Estetica',
            'Dolor rodilla',
            'musculo desgarrado'
        ]);

        $estadoTratamiento = ([
            'Iniciando',
            'En proceso',
            'Finalizado'
        ]);

        return [
            'id' => 1,
            'codigo' => 1,
            
            'hora' => $hora[array_rand($hora)],
            'fecha' => $fecha[array_rand($fecha)],
            'motivoConsulta' => $motivoConsulta[array_rand($motivoConsulta)],
            'estadoTratamiento' => $estadoTratamiento[array_rand($estadoTratamiento)],
            'created_at' => Carbon::parse(today())->format('Y-m-d'),
            'updated_at' => Carbon::parse(today())->format('Y-m-d')
        ];
    }
}
