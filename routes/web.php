<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\SitioController;
use App\Http\Middleware\esAdministrador;
use App\Http\Middleware\estaLoggeado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::name("sitio.")->group(function () {
    Route::controller(SitioController::class)->group(function () {
        Route::get("/", "inicio")->name("home");
        Route::get("publicacion/{id}", "verArticulo")->name("sistemaArticulo");

        Route::get("categorias/{nombre}", "verArticulosDeCategoria")->name("categoria");  // antes: tags nombre -> verArticulosDeEtiqueta -> name("etiqueta")
        
        Route::get("/MostrarTodasLasFotos", "verTodosArticulos")->name("todosArticulos");
        Route::get("/MostrarTodasLasCategorias", "categoriasConArticulos")->name("todasCategorias");  // antes: todas-etiquetas -> etiquetasConArticulos -> name("todasEtiquetas")
        
        
        
        Route::get("busqueda", "busqueda")->name("sistemaBusqueda");
        Route::get("/vistas-autor/{usuario_id?}", "vistaPorAutor")->name("vistaPorAutor");
        // Mostrar el formulario (GET)
        Route::get("ActualizarContrasena", "formularioContrasena")->name("formularioContrasena");

        // Procesar el formulario (POST)
        Route::post("ActualizarContrasena", "ActualizarContrasena")->name("ActualizarContrasena");

        Route::get('/recuperar-contrasena', 'obtenerDatos')->name('obtenerDatos');
        Route::post('/recuperar-contrasena', 'enviarComprobacion')->name('enviarComprobacion');
        Route::post('/actualizar-contrasena', 'nuevaContrasena')->name('nuevaContrasena');
    });
});

Route::name("admin.")->group(function () {
    Route::controller(AdministradorController::class)->group(function () {

        Route::middleware(esAdministrador::class)->group(function () {
            Route::get("admin/inicio", "inicio")->name("adminInicio");

            Route::get("admin/articulos/registros", "articulosRegistros")->name("articuloRegistros");
            Route::get("admin/articulos/formulario/{id?}", "articulosFormulario")->name("articuloFormulario");
            Route::post("admin/articulos/registrar", "articulosRegistrar")->name("articuloRegistrar");
            Route::post("admin/articulos/eliminar", "articulosEliminar")->name("articuloEliminar");

            Route::get("admin/categorias/registros", "categoriasRegistros")->name("categoriasRegistros");  // antes: admin/etiquetas/registros -> etiquetasRegistros
            Route::get("admin/categorias/formulario/{id?}", "categoriasFormulario")->name("categoriaFormulario");  // antes: etiquetas/formulario -> etiquetasFormulario
            Route::post("admin/categorias/registrar", "categoriasRegistrar")->name("categoriaRegistrar");  // antes: etiquetas/registrar -> etiquetasRegistrar
            Route::post("admin/categorias/eliminar", "categoriasEliminar")->name("categoriaEliminar");  // antes: etiquetas/eliminar -> etiquetasEliminar

            Route::get("admin/cerrar-sesion", "cerrarSesion")->name("logout");
        });

        Route::middleware(estaLoggeado::class)->group(function () {
            Route::get("admin/iniciar-sesion", "iniciarSesion")->name("login");
            Route::post("admin/entrar", "entrar")->name("entrar");
            Route::get("admin/registro", "registro")->name("registro");
            Route::post("admin/registrar", "registrar")->name("registrar");
        });
    });
});
