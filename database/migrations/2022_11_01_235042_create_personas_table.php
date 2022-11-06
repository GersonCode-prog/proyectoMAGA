<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 10);
            $table->string('dpi',16);
            $table->string('genero',16);
            $table->date('fechaNacimiento');
            $table->foreignId('tipoPersona_id')->constrained('tipopersonas');
            $table->foreignId('comunidad_id')->constrained('comunidads');
            $table->foreignId('user_id')->constrained('users');
            $table->string('activo');
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
        Schema::dropIfExists('personas');
    }
};
