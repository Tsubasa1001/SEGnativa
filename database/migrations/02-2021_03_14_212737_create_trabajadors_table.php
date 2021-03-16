<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id()->autoIncrement(false);
            $table->string('codigo', 50);
            $table->string('ci', 20)->unique();
            $table->string('nombre', 50);
            $table->string('nacionalidad', 50);
            $table->string('especialidad', 50);
            $table->string('cargo', 50);
            $table->string('ocupacion', 50);
            $table->string('direccion', 50);
            $table->string('email', 50)->unique();
            $table->integer('celular', false);
            $table->integer('edad', false);
            $table->char('genero', 1);
            $table->date('fecha_creacion');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('trabajadors');
    }
}
