<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
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
            "categoria" => Categoria::all(),
            "articulos" => Articulo::ordernarPorFecha()->get()
        ]);
    }

    /*
        creamos una variable llamada "categorias" a la cual le asignamos el resultado de la consulta a la base de datos
        usando el modelo Categoria, que representa la tabla "categorias" en la base de datos.

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

    public function verArticulosDeCategoria($nombre)
    {
        $registros = Categoria::nombre($nombre)->first()?->articulos;
        $categorias = Categoria::with('articulos')->get();
        $categoria = Categoria::where('nombre', $nombre)->first();
        
        return view('categoria', [
            "articulos" => $registros,
            'categorias' => $categorias,
            "categoriaActual" => $categoria

        ]);
    }

    /*
        agregamos como parámetro la variable $nombre que representa el nombre de la categoría que se busca.
        guardamos en $registros el resultado de la consulta a la base de datos usando el modelo Categoria,
    */

    public function busqueda()
    {
        return view('busqueda', [
            "buscandoAndo" => Articulo::where('titulo', 'like', '%' . request('busqueda') . '%')->paginate(5)
        ]);
    }

    public function verTodosArticulos()
    {
        return view('verTodosArticulos', [
            "articulos" => Articulo::all(),
            "categorias" => Categoria::all(),
        ]);
    }

    public function categoriasConArticulos()
    {
        $categorias = Categoria::with('articulos')->get();
        return view('todasCategorias', [
            'categorias' => $categorias
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
        return view("pedirCorreo");
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
