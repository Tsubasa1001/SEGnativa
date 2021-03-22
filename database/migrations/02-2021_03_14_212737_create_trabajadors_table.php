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
            $table->id()->autoIncrement(false);
            $table->string('codigo', 50)->unique();
            $table->string('ci', 20)->unique();
            $table->string('nombre', 50);
            $table->string('nacionalidad', 50);
            $table->string('especialidad', 2);
            $table->string('cargo', 50);
            $table->string('ocupacion', 50);
            $table->string('direccion', 50);
            $table->string('email', 50)->unique();
            $table->integer('celular', false);
            $table->integer('edad', false);
            $table->enum('genero', ['M', 'F']);
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
