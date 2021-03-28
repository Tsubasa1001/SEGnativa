<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promocions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocions', function (Blueprint $table) {
            $table->id()->autoIncrement(false);
            $table->string('nombre', 50);
            $table->integer('cantidad', false)->nullable();
            $table->float('precio', 4, 2);
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
        Schema::dropIfExists('promocions');
        Schema::enableForeignKeyConstraints();
    }
}
