<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContenidoBase extends Seeder
{
    public function run(): void
    {
        // Insertar categorías
        $categorias = [
            ['nombre' => "Animales", 'portada_categoria' => "portadas/PortadaAnimales.jpg"],
            ['nombre' => "Arquitectura", 'portada_categoria' => "portadas/PortadaArquitectura.jpg"],
            ['nombre' => "Convenciones", 'portada_categoria' => "portadas/PortadaConvenciones.jpg"],
            ['nombre' => "Cosplay", 'portada_categoria' => "portadas/PortadaCosplay.jpg"],
            ['nombre' => "Creepy", 'portada_categoria' => "portadas/PortadaCreepy.jpg"],
            ['nombre' => "Familiares", 'portada_categoria' => "portadas/PortadaFamiliares.jpg"],
            ['nombre' => "Luna", 'portada_categoria' => "portadas/PortadaLuna.jpg"],
            ['nombre' => "Naturaleza", 'portada_categoria' => "portadas/PortadaNaturaleza.jpg"],
            ['nombre' => "Retratos", 'portada_categoria' => "portadas/PortadaRetratos.jpg"],
            ['nombre' => "Street", 'portada_categoria' => "portadas/PortadaStreet.jpg"],
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert($categoria);
        }

        // Insertar usuarios
        $usuarios = [
            ['nombre' => "Ulises", 'email' => "Ulises@live.com", 'password' => Hash::make("123")],
            ['nombre' => "Armando", 'email' => "Armando@live.com", 'password' => Hash::make("PollitoArmando")],
            ['nombre' => "Alice", 'email' => "Alice@live.com", 'password' => Hash::make("PollitoAlice")],
            ['nombre' => "Luu", 'email' => "Luu@live.com", 'password' => Hash::make("PollitoLuu")],
        ];

        $usuarioIds = [];
        foreach ($usuarios as $usuario) {
            $usuarioIds[] = DB::table('usuarios')->insertGetId($usuario);
        }

        // Insertar 15 artículos de la categoría Animales
        for ($i = 1; $i <= 15; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Animal Foto $i",
                'portada' => "fotos/Animales/foto_$i.jpg",
                'descripcion' => "Foto de animal número $i.",
                'contenido' => "Este es un artículo con una foto de animal número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 1, // Animales
                'articulo_id' => $articuloId,
            ]);
        }

        // Insertar 14 artículos de la categoría Arquitectura
        for ($i = 1; $i <= 14; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Arquitectura Foto $i",
                'portada' => "fotos/Arquitectura/foto_$i.jpg",
                'descripcion' => "Foto de arquitectura número $i.",
                'contenido' => "Este es un artículo con una foto de arquitectura número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 2, // Arquitectura
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Convenciones
        for ($i = 1; $i <= 63; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Convenciones Foto $i",
                'portada' => "fotos/Convenciones/foto_$i.jpg",
                'descripcion' => "Foto de Convenciones número $i.",
                'contenido' => "Este es un artículo con una foto de Convenciones número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 3, // Convenciones
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Cosplay
        for ($i = 1; $i <= 13; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Cosplay Foto $i",
                'portada' => "fotos/Cosplay/foto_$i.jpg",
                'descripcion' => "Foto de Cosplay número $i.",
                'contenido' => "Este es un artículo con una foto de Cosplay número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 4, // Cosplay
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Creepy
        for ($i = 1; $i <= 19; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Creepy Foto $i",
                'portada' => "fotos/Creepy/foto_$i.jpg",
                'descripcion' => "Foto de Creepy número $i.",
                'contenido' => "Este es un artículo con una foto de Creepy número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 5, // Creepy
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Familiares
        for ($i = 1; $i <= 24; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Familiares Foto $i",
                'portada' => "fotos/Familiares/foto_$i.jpg",
                'descripcion' => "Foto de Familiares número $i.",
                'contenido' => "Este es un artículo con una foto de Familiares número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 6, // Familiares
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Luna
        for ($i = 1; $i <= 3; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Luna Foto $i",
                'portada' => "fotos/Luna/foto_$i.jpg",
                'descripcion' => "Foto de Luna número $i.",
                'contenido' => "Este es un artículo con una foto de Luna número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 7, // Luna
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Naturaleza
        for ($i = 1; $i <= 40; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Naturaleza Foto $i",
                'portada' => "fotos/Naturaleza/foto_$i.jpg",
                'descripcion' => "Foto de Naturaleza número $i.",
                'contenido' => "Este es un artículo con una foto de Naturaleza número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 8, // Naturaleza
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Retratos
        for ($i = 1; $i <= 12; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Retratos Foto $i",
                'portada' => "fotos/Retratos/foto_$i.jpg",
                'descripcion' => "Foto de Retratos número $i.",
                'contenido' => "Este es un artículo con una foto de Retratos número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 9, // Retratos
                'articulo_id' => $articuloId,
            ]);
        }
        // Insertar 14 artículos de la categoría Street
        for ($i = 1; $i <= 7; $i++) {
            $articuloId = DB::table('articulos')->insertGetId([
                'titulo' => "Street Foto $i",
                'portada' => "fotos/Street/foto_$i.jpg",
                'descripcion' => "Foto de Street número $i.",
                'contenido' => "Este es un artículo con una foto de Street número $i.",
                'usuario_id' => $usuarioIds[array_rand($usuarioIds)],
            ]);

            DB::table('articulo_categoria')->insert([
                'categoria_id' => 10, // Street
                'articulo_id' => $articuloId,
            ]);
        }










    }






}
