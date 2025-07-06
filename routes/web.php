<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\SitioController;
use App\Http\Middleware\esAdministrador;
use App\Http\Middleware\estaLoggeado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::name("sitio.")->group( function(){
    Route::controller(SitioController::class)->group(function(){
        Route::get("/", "inicio")->name("home");
        Route::get("publicacion/{id}", "verArticulo")->name("sistemaArticulo");
        Route::get("tags/{nombre}", "verArticulosDeEtiqueta")->name("etiqueta");
        Route::get("busqueda", "busqueda")->name("sistemaBusqueda");
        Route::get("/articulos","verTodosArticulos")->name("todosArticulos");
        Route::get("/todas-etiquetas", "etiquetasConArticulos")->name("todasEtiquetas");
        Route::get("/vistas-autor/{usuario_id?}", "vistaPorAutor")->name("vistaPorAutor");
    });
});


Route::name("admin.")->group( function(){
    Route::controller(AdministradorController::class)->group(function(){

        Route::middleware(esAdministrador::class)->group(function(){
            Route::get("admin/inicio", "inicio")->name("adminInicio");     
                                                     
            Route::get("admin/articulos/registros", "articulosRegistros")->name("articuloRegistros");               //
            Route::get("admin/articulos/formulario/{id?}", "articulosFormulario")->name("articuloFormulario");      //
            Route::post("admin/articulos/registrar", "articulosRegistrar")->name("articuloRegistrar");             //
            Route::post("admin/articulos/eliminar", "articulosEliminar")->name("articuloEliminar");                //
            
            Route::get("admin/etiquetas/registros", "etiquetasRegistros")->name("etiquetasRegistros"); 
            Route::get("admin/etiquetas/formulario/{id?}", "etiquetasFormulario")->name("etiquetaFormulario");      //
            Route::post("admin/etiquetas/registrar", "etiquetasRegistrar")->name("etiquetaRegistrar");             //
            Route::post("admin/etiquetas/eliminar", "etiquetasEliminar")->name("etiquetaEliminar");                //


            Route::get("admin/cerrar-sesion", "cerrarSesion")->name("logout");                                     //
            

        });

        Route::middleware(estaLoggeado::class)->group(function(){
            Route::get("admin/iniciar-sesion", "iniciarSesion")->name("login");
            Route::post("admin/entrar", "entrar")->name("entrar");
            Route::get("admin/registro", "registro")->name("registro");
            Route::post("admin/registrar", "registrar")->name("registrar");
        }); 
     });
  });







            /* 
            para acceder a dichas rutas desde la URL o URI es usando 
            El 1er PARAMETRO entre comillas por ejemplo:
            "/", "publicacion/id}", "tags/nombre}", "busqueda". eso es desde el navegador 

            El 2do PARAMETRO es el nombre del método en el controlador SitioController que maneja esa ruta.
            El 3er PARAMETRO es el nombre que se le asigna a esta ruta,
            por ejemplo: "sistemaInicio", "sistemaArticulo", "etiqueta","sistemaBusqueda".
            ->NAME es un método que asigna un nombre a la ruta,
            lo que permite referenciarla fácilmente en otras partes de la aplicación, como en las vistas o en redirecciones. 
            Ejemplo, < a href=" route('sitio.sistemaInicio') ">Inicio</a> 
            */

/* 
        por si se me olvida 
    Te explico lo que esta Route::get("/", "inicio")->name("sistemaInicio");
    "/" es la ruta que se accede al inicio del sitio web (URL o URI),
    "inicio" es el nombre del método en el controlador SitioController que maneja esa ruta.
    "sistemaInicio" es el nombre que se le asigna a esta ruta, 
                    


*/