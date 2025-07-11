<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionesRegistro;
use App\Models\Articulo;
use App\Models\ArticuloCategoria;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdministradorController extends Controller
{
    public function iniciarSesion()
    {
        return view('admin.login');
    }

    public function entrar(Request $request)
    {
        if (Auth::attempt(["email" => $request->get('correo'), "password" => $request->get('contrasena')])) {
            alert()->success('Bienvenido', 'Has iniciado sesión');
            return redirect()->route("sitio.home");
        } else {
            alert()->error('Algo ha salido mal', 'Tus datos de acceso no coinciden');
            return redirect()->route("admin.login");
        }
    }

    public function cerrarSesion()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect()->route("sitio.home");
    }

    public function registro()
    {
        return view('admin.registro');
    }

    public function registrar(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|string|max:20',
                'correo' => 'required|email|unique:usuarios,email',
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'g-recaptcha-response.required' => 'Debes completar el captcha',
            ]
        );

        $contra = round(1000, 9999);
        $usuario = new User;
        $usuario->nombre = $request->get("nombre");
        $usuario->email = $request->get('correo');
        $usuario->password = Hash::make($contra);
        $usuario->save();

        Mail::to($request->get('correo'))
            ->send(new NotificacionesRegistro($request->get('correo'), $contra));

        Auth::loginUsingId($usuario->id);
        return redirect()->route("sitio.home");
    }

    public function inicio()
    {
        return view('admin.inicio', [
            "articulos" => Articulo::count(),
            "categorias" => Categoria::count()
        ]);
    }

    public function articulosRegistros()
    {
        return view("admin.articulos.registros", [
            "registros" => Articulo::all()
        ]);
    }

    public function categoriasRegistros()
    {
        return view("admin.categorias.registros", [
            "registrosCategorias" => Categoria::all()
        ]);
    }

    public function articulosFormulario($id = null)
    {
        return view("admin.articulos.formulario", [
            "categorias" => Categoria::all(),
            "articulo" => Articulo::with("categorias")->find($id)
        ]);
    }

    public function categoriasFormulario($id = null)
    {
        return view("admin.categorias.formulario", [
            "categoria" => Categoria::find($id)
        ]);
    }

    public function articulosRegistrar(Request $request)
    {
        DB::transaction(function () use ($request) {
            $ruta = Storage::disk('public')->putFile('portadas', $request->file('portada'));

            $articulo = Articulo::firstOrNew(["id" => $request->get('id')]);
            $articulo->titulo = $request->get('titulo');
            $articulo->portada = "/$ruta";
            $articulo->descripcion = $request->get('descripcion');
            $articulo->contenido = $request->get('contenido');
            $articulo->fecha_visualizacion = $request->get('fecha');
            $articulo->usuario_id = Auth::id();
            $articulo->save();

            // Eliminar categorías antiguas
            ArticuloCategoria::where('articulo_id', $articulo->id)
                ->whereNotIn('categoria_id', $request->get('categoria'))
                ->delete();

            foreach ($request->get('categoria') as $c) {
                $categoria = ArticuloCategoria::firstOrNew([
                    'articulo_id' => $articulo->id,
                    'categoria_id' => $c
                ]);
                $categoria->articulo_id = $articulo->id;
                $categoria->categoria_id = $c;
                $categoria->save();
            }
        });

        return redirect()->route('admin.articuloRegistros');
    }

    public function categoriasRegistrar(Request $request)
    {
        DB::transaction(function () use ($request) {
            $categoria = Categoria::firstOrNew(["id" => $request->get('id')]);
            $categoria->nombre = $request->get('nombre');
            $categoria->save();
        });

        return redirect()->route('admin.categoriasRegistros');
    }

    public function articulosEliminar(Request $request)
    {
        DB::transaction(function () use ($request) {
            ArticuloCategoria::where('articulo_id', $request->get('id'))->delete();

            $articulo = Articulo::find($request->get('id'));
            if ($articulo) {
                $articulo->delete();
            }
        });

        return redirect()->route('admin.articuloRegistros');
    }

    public function categoriasEliminar(Request $request)
    {
        DB::transaction(function () use ($request) {
            ArticuloCategoria::where('categoria_id', $request->get('id'))->delete();
            $categoria = Categoria::find($request->id)->delete();
        });

        return redirect()->route('admin.categoriasRegistros');
    }

    public function cambioContrasena()
    {
        return view("cambioContrasena");
    }
}
