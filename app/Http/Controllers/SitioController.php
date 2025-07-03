<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitioController extends Controller
{
    public function inicio()  /* A este llamamos desde web.php "/" */
    {
        
        return view('inicio', [
            "etiquetas" => Etiqueta::all(),
            "articulos" => Articulo::ordernarPorFecha()->get()
        ]);
    }

    /*              
            creamos una variable llamada "etiquetas" a la cual le asignamos el resultado de la consulta a la base de datos
            usando el modelo Etiqueta, que representa la tabla "etiquetas" en la base de datos.

            para "articulos " hacemos lo mismo, pero ordenamos los artículos por fecha usando el método "ordernarPorFecha()"
            
    */

    public function verArticulo($id)
    {
        return view('articulo', [
            "registro" => Articulo::find($id)
        ]);
    }

    /* 
        creamos una variable llamada "registro" a la cual le asignamos el resultado de la consulta a la base de datos
        usando el modelo Articulo, que representa la tabla "articulos" en la base de datos.
        find($id) busca un artículo por su ID.

    */


    public function verArticulosDeEtiqueta($nombre){
        $registros = Etiqueta::nombre($nombre)->first()?->articulos;
        

        return view('etiquetas', [
            "articulos" => $registros
        ]);
    }

        /* 
            agregamos como parametro la variable $nombre que representa el nombre de la etiqueta que se busca.
            guardamos en $registros el resultado de la consulta a la base de datos usando el modelo Etiqueta,

            La función view() en Laravel se usa así:
                Rrturn view/('nombre_de_la_vista', [
                    'clave' => 'valor',
                ]);

                por lo tanto guardamos en registro el los datos de la etiqueta que se busca,

        
        */

    public function busqueda(){
        return view('busqueda', [
            "nombre_personaje" => "La campeona de los precios bajos",
            "imagen_personaje" => "https://i.pinimg.com/736x/ac/b5/de/acb5de161d451113a6ed182bf5c5e2f1.jpg",
        ]);
    }


    public function verTodosArticulos(){
        return view('verTodosArticulos', [
            "articulos" => Articulo::all()
        ]);
    }

    public function etiquetasConArticulos() {
        $etiquetas = Etiqueta::with('articulos')->get();
        return view('todasEtiquetas', [
            'etiquetas' => $etiquetas
        ]);
    }

    public function iniciarSesion()
    {
        return view('admin.login');
    }

}

