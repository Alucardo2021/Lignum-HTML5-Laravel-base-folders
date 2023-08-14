<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Pelicula', function (Blueprint $table) {
            $table->bigIncrements('PeliculaID');
            $table->string('Titulo');
            $table->integer('Año');
            $table->integer('Duracion');
            $table->text('Sinopsis');
            $table->string('Imagen')->nullable();
            $table->unsignedBigInteger('ActorPrincipalID');
            $table->foreign('ActorPrincipalID')->references('ActorID')->on('Actor');
            $table->boolean('Favorito')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pelicula');
    }
};
