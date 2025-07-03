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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('airline');
            $table->timestamps(); 
            $table->dateTime('approach');
            $table->integer('passengers');
            $table->boolean('active');
            $table->enum("model", ["Boeing", "Aribus", "Embracer"]);
        });

        Schema::create('usuarios', function (Blueprint $table){
            $table -> id();
            $table -> string('nombre', 255);
            $table -> string('email', 255);
            $table -> string('password', 200);
            $table -> string('remember_token', 100) -> nullable();
            $table -> timestamps();
        });

        Schema::create('articulos', function(Blueprint $table){
            $table -> id();
            $table -> string('titulo', 255);
            $table -> string('portada', 400);
            $table -> string('descripcion', 255);
            $table -> text('contenido');
            $table -> dateTime('fecha_visualizacion') -> nullable();
            $table -> foreignId('usuario_id') -> constrained('usuarios');
            $table -> timestamps();
        });

        Schema::create('etiquetas', function(Blueprint $table){
            $table -> id();
            $table -> string('nombre', 255);
            $table -> timestamps();
        });

        Schema::create('articulo_etiqueta', function(Blueprint $table){
            $table -> foreignId('etiqueta_id') -> constrained('etiquetas') -> onDelete('cascade');
            $table -> foreignId('articulo_id') -> constrained('articulos') -> onDelete('cascade');
            $table -> timestamps();
            $table->primary(['etiqueta_id', 'articulo_id']);
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('flights');
        Schema::dropIfExists('articulo_etiqueta');
        Schema::dropIfExists('etiquetas');
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('usuarios');
    }
};