<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContenidoBase extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquetas')->insert([
            'nombre' => "Economia",
        ]);
        DB::table('etiquetas')->insert([
            'nombre' => "Musica",
        ]);
        DB::table('etiquetas')->insert([
            'nombre' => "Cultura",
        ]);
        DB::table('etiquetas')->insert([
            'nombre' => "Nota roja",
        ]);
        DB::table('etiquetas')->insert([
            'nombre' => "Entretenimiento",
        ]);
        DB::table('etiquetas')->insert([
            'nombre' => "Deportes",
        ]);
        DB::table('etiquetas')->insert([
            'nombre' => "Politica",
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        DB::table('usuarios')->insert([
            'nombre' => "Ulises",
            'email' => "Ulises@live.com",
            'password' => Hash ::make ( "PollitoUlises"),
        ]);
        DB::table('usuarios')->insert([
            'nombre' => "Armando",
            'email' => "Armando@live.com",
            'password' => Hash ::make ( "PollitoArmando"),
        ]);
        DB::table('usuarios')->insert([
            'nombre' => "Alice",
            'email' => "Alice@live.com",
            'password' => Hash ::make ( "PollitoAlice"),
        ]);
        DB::table('usuarios')->insert([
            'nombre' => "Luu",
            'email' => "Luu@live.com",
            'password' => Hash ::make ( "PollitoLuu"),
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        DB::table('articulos')->insert([
            'titulo' => "Elizabeth",
            'portada' => "https://i.pinimg.com/736x/6b/f3/69/6bf369ef48fb9b064b1202f87d8071ca.jpg",
            'descripcion' => "Actriz conocida por su papel como Jade West en Victorious.",
            'contenido' => "Elizabeth Gillies es una actriz y cantante estadounidense reconocida principalmente por su papel como Jade West en la serie de Nickelodeon 'Victorious'. Con una personalidad sarcástica y estilo alternativo, su personaje se convirtió en uno de los favoritos de los fans. Tras 'Victorious', Gillies protagonizó la serie 'Dynasty' como Fallon Carrington, mostrando su versatilidad actoral y talento vocal. Es admirada por su carisma, su poderosa voz y su presencia en pantalla.",
            'usuario_id' => 1,
        ]);

        DB::table('articulos')->insert([
            'titulo' => "Dva",
            'portada' => "https://i.pinimg.com/736x/34/a8/b3/34a8b32085e761b42da5781b322c8c64.jpg",
            'descripcion' => "Piloto de meca en Overwatch, exjugadora profesional.",
            'contenido' => "D.Va, cuyo nombre real es Hana Song, es una heroína en el videojuego Overwatch. Antes de unirse a la fuerza de defensa MEKA, fue una famosa jugadora profesional de videojuegos en Corea del Sur. Pilota un meca altamente tecnológico y es conocida por su actitud audaz, frases icónicas y jugabilidad dinámica. Es uno de los personajes más populares del juego por su carisma y habilidades de combate.",
            'usuario_id' => 2,
        ]);

        DB::table('articulos')->insert([
            'titulo' => "Orisa",
            'portada' => "https://i.pinimg.com/736x/8d/b9/95/8db995304e8c1e49b8f0d9b98c0d14c9.jpg",
            'descripcion' => "Robot guardián de Numbani, personaje tanque de Overwatch.",
            'contenido' => "Orisa es una unidad robótica diseñada para proteger la ciudad de Numbani en Overwatch. Fue construida por la joven genio Efi Oladele y programada con un fuerte sentido de justicia y protección. En el juego, Orisa cumple el rol de tanque, proporcionando escudos y control de masas para su equipo. Su presencia imponente y habilidades defensivas la hacen una pieza clave en muchas estrategias.",
            'usuario_id' => 3,
        ]);

        DB::table('articulos')->insert([
            'titulo' => "Wusa",
            'portada' => "https://i.pinimg.com/736x/79/79/2d/79792d4f120e04cba013deeb3fc304ed.jpg",
            'descripcion' => "Clase mística femenina de Black Desert Online.",
            'contenido' => "Wusa es una clase jugable en el MMORPG Black Desert Online. Se especializa en artes místicas y habilidades de control basadas en la naturaleza y los espíritus. Con su abanico mágico, lanza poderosos ataques AoE y habilidades que ralentizan a sus enemigos. Su estilo de combate elegante pero devastador la convierte en una clase favorita para jugadores que buscan un equilibrio entre estética y poder.",
            'usuario_id' => 4,
        ]);

        DB::table('articulos')->insert([
            'titulo' => "Octane",
            'portada' => "https://i.pinimg.com/736x/ae/4b/d4/ae4bd4ba38d844c4772314848a8634ee.jpg",
            'descripcion' => "Personaje veloz y temerario de Apex Legends.",
            'contenido' => "Octane, nombre real Octavio Silva, es un personaje jugable en Apex Legends conocido por su velocidad extrema y actitud imprudente. Su habilidad táctica le permite correr más rápido sacrificando salud, mientras que su definitiva lanza una plataforma de salto para una movilidad explosiva. Octane es ideal para jugadores que aman la acción rápida y jugadas arriesgadas.",
            'usuario_id' => 1,
        ]);

        DB::table('articulos')->insert([
            'titulo' => "Ashley",
            'portada' => "https://i.pinimg.com/736x/8b/37/77/8b37772f53c2037ef211093268763f27.jpg",
            'descripcion' => "Personaje clave en Resident Evil 4, hija del presidente.",
            'contenido' => "Ashley Graham es la hija del presidente de los Estados Unidos en Resident Evil 4. Es secuestrada por un culto y rescatada por el agente Leon S. Kennedy. Aunque es un personaje no jugable, su papel es crucial para la narrativa. En el remake de 2023, su personalidad y diseño fueron actualizados, mejorando su interacción con el jugador y su contribución al desarrollo de la historia.",
            'usuario_id' => 2,
        ]);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 1,
            'articulo_id' => 1,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 1,
            'articulo_id' => 2,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 2,
            'articulo_id' => 3,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 2,
            'articulo_id' => 4,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 3,
            'articulo_id' => 5,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 3,
            'articulo_id' => 6,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 4,
            'articulo_id' => 1,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 4,
            'articulo_id' => 2,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 5,
            'articulo_id' => 3,
        ]);
        DB::table('articulo_etiqueta')->insert([
            'etiqueta_id' => 5,
            'articulo_id' => 4,
        ]);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    }
}
