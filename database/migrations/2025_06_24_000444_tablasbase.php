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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('email', 255);
            $table->string('password', 200);
            $table->string('remember_token', 100)->nullable();
            $table->string('codigo_verificacion')->nullable();
            $table->timestamp('codigo_expira_en')->nullable();
            $table->timestamps();
        });

        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('portada', 400);
            $table->string('descripcion', 255);
            $table->text('contenido');
            $table->dateTime('fecha_visualizacion')->nullable();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('portada_categoria', 400)->nullable();
            $table->timestamps();
        });

        Schema::create('articulo_categoria', function (Blueprint $table) {
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('articulo_id')->constrained('articulos')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['categoria_id', 'articulo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo_categoria');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('usuarios');
    }
};
