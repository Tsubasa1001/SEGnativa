<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class UsuarioSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        /**Usuarios para pruebas del equipo */
        DB::table('users')->insert(['id' => 500,'name' => 'nair','email' => 'nair@gmail.com','privilegio' => 1,'email_verified_at' => now(),'password' => Hash::make('nairnair'),'remember_token' => Str::random(10),'created_at' => Carbon::parse(today())->format('Y-m-d'),'updated_at' => Carbon::parse(today())->format('Y-m-d')]);
        DB::table('users')->insert(['id' => 501,'name' => 'sariah','email' => 'sariah@gmail.com','privilegio' => rand(2,3),'email_verified_at' => now(),'password' => Hash::make('sariahsariah'),'remember_token' => Str::random(10),'created_at' => Carbon::parse(today())->format('Y-m-d'),'updated_at' => Carbon::parse(today())->format('Y-m-d')]);
        DB::table('users')->insert(['id' => 502,'name' => 'gustavo','email' => 'gustavo@gmail.com','privilegio' => rand(2,3),'email_verified_at' => now(),'password' => Hash::make('gustavogustavo'),'remember_token' => Str::random(10),'created_at' => Carbon::parse(today())->format('Y-m-d'),'updated_at' => Carbon::parse(today())->format('Y-m-d')]);
        DB::table('users')->insert(['id' => 503,'name' => 'eyver','email' => 'eyver@gmail.com','privilegio' => rand(2,3),'email_verified_at' => now(),'password' => Hash::make('eyvereyver'),'remember_token' => Str::random(10),'created_at' => Carbon::parse(today())->format('Y-m-d'),'updated_at' => Carbon::parse(today())->format('Y-m-d')]);

        /**Usuarios random */
        for ($pk=1; $pk <=10; $pk++) {
            User::factory()->create(['id' => $pk]);
        }
    }
}
