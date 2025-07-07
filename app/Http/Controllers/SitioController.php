<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Etiqueta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SitioController extends Controller
{
    public function inicio()
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


    public function verArticulosDeEtiqueta($nombre)
    {
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

    public function busqueda()
    {


        return view('busqueda', [
            "buscandoAndo" => Articulo::where('titulo', 'like', '%' . request('busqueda') . '%')->paginate(2)
        ]);
    }


    public function verTodosArticulos()
    {
        return view('verTodosArticulos', [
            "articulos" => Articulo::all()
        ]);
    }

    public function etiquetasConArticulos()
    {
        $etiquetas = Etiqueta::with('articulos')->get();
        return view('todasEtiquetas', [
            'etiquetas' => $etiquetas
        ]);
    }

    public function vistaPorAutor()
    {
        $autor = Articulo::all();
        return view('vistaPorAutor', [
            'autor' => $autor
        ]);
    }


    public function iniciarSesion()
    {
        return view('admin.login');
    }

    public function formularioContrasena()
    {
        return view('actualizarContrasena');
    }


    public function ActualizarContrasena(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasenaActual' => 'required',
            'contrasenaNueva' => 'required',
        ]);


        if (Auth::attempt(["email" => $request->get('correo'), "password" => $request->get('contrasenaActual')])) {
            $user = User::where('email', $request->get('correo'))->first();
            $user->password = $request->contrasenaNueva;
            $user->save();



            alert()->success('Contraseña Actualizada');
            return redirect()->route("sitio.home");
        } else {
            alert()->error('Algo ha salido mal', 'Tus datos de acceso no coinciden');
            return redirect()->route("sitio.ActualizarContrasena");
        }
    }


    public function obtenerDatos()
    {
        return view("pedirCorreo"); // Esta vista la modificaremos después
    }

    public function enviarComprobacion(Request $request)
    {
        $user = User::where('email', $request->get('correo'))->first();

        if ($user) {
            alert()->success('Agrega la nueva contraseña');
            return view("ingresarContraseñaNueva", ['email' => $request->get('correo')]);
        }
        alert()->error('El correo no existe');
        return view('pedirCorreo');
    }



    public function nuevaContrasena(Request $request)
    {
      

        $user = User::where('email', $request->get('correo'))->first();
        $user->password = Hash::make($request->password);
        $user->save();

        alert()->success('Contraseña actualizada exitosamente');
        return redirect()->route('sitio.home');
    }
}
