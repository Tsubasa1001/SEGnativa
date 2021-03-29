<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkinTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skin_tests', function (Blueprint $table) {
            /*
            $table->id()->autoincrement(false);
            $table->string('codigo',50);
            $table->string('tratamientoDermatologico',100);
            $table->string('cirugia',100);
            $table->string('problemasSalud',100);
            $table->string('fuma',100);
            $table->string('actividadFisica',100);
            $table->string('alergias',100);
            $table->string('medicacion',100);
            $table->string('afeccionPiel',100);
            $table->string('hidratacion',100);
            $table->string('observacionCosmetica',100);
            
            $table->date('created_at');
            $table->date('updated_at');

            $table->unsignedBigInteger('consulta_id');

            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
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
        //Schema::dropIfExists('skin_tests');
    }
}
