<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misions', function (Blueprint $table) {
            $table->id();

            $table->string('id_cliente', 100);
            $table->string('recompensa', 400);
            $table->integer('ninjas_estimados')->default(0)->unsigned();
            $table->string('pago', 400);
            $table->enum('estado', ['pendiente', 'en proceso', 'realizada', 'fallida'])->default('pendiente');
            $table->boolean('urgente')->default(false);
            $table->date('fecha_finalizacion')->default(0)->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('misions');
    }
}
