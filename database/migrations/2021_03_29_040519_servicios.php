<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('nombre', 50);
            $table->float('precio', 8, 2);
            $table->integer('id_equipamiento')->unsigned();
            $table->foreign('id_equipamiento')->references('id')->on('equipamientos');
            $table->integer('id_promocion')->unsigned();
            $table->foreign('id_promocion')->references('id')->on('promocions');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('servicios');
        Schema::enableForeignKeyConstraints();
    }
}
