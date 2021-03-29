<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id()->autoIncrement(true);
            $table->string('codigo', 50)->unique()->nullable();
            $table->string('ci', 20)->unique()->nullable();
            $table->string('nombre', 50);
            $table->string('nacionalidad', 50)->nullable();
            $table->string('especialidad', 2)->nullable();
            $table->string('cargo', 50)->nullable();
            $table->string('ocupacion', 50)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->integer('celular', false)->nullable();
            $table->integer('edad', false)->nullable();
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('trabajadors');
        Schema::enableForeignKeyConstraints();
    }
}
