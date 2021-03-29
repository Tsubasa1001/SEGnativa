<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_citas', function (Blueprint $table) {
           /* 
            $table->id()->autoincrement(false);
            $table->string('codigo',50)->unique();
            $table->string('hora');
            $table->string('fecha');
            $table->string('motivoConsulta');
            $table->string('estadoTratamiento');
            $table->date('created_at');
            $table->date('updated_at');

            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('trabajador_id');

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('trabajador_id')->references('id')->on('trabajadors')->onDelete('cascade');
            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reserva_citas');
        Schema::enableForeignKeyConstraints();
        */
    }
}
