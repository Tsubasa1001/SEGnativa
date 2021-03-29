<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
           /* $table->id()->autoincrement(false);
            $table->string('codigo',50);
            $table->string('horaEntrada',10);
            $table->string('horaSalida',10);
            $table->String('notas',255);
            $table->string('diagnosticoFinal',255);
            
            $table->date('created_at');
            $table->date('updated_at');

            $table->unsignedBigInteger('reservaCita_id');
            //$table->unsignedBigInteger('servicio_id');

            $table->foreign('reservaCita_id')->references('id')->on('reservaCitas')->onDelete('cascade');
            //$table->foreign('servicios_id')->references('id')->on('servicios')->onDelete('cascade');
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
       // Schema::dropIfExists('consultas');
    }
}
