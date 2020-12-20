<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNinjas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ninjas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',100);
            $table->date('fecha_registro');
            $table->enum('rango',['novato','soldado','veterano','maestro']);
            $table->enum('estado',['activo','herido','muerto','desertor']);
            $table->string('informe_habilidades',400);
            
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
        Schema::dropIfExists('ninjas');
    }
}
