@extends("layouts.main")

@section("titulo", "Mi sitio web de Laravel")


@section("contenido")
<br>
<ul class="list-group list-group-horizontal mt-4 justify-content-center">
    @foreach($etiquetas AS $e)
    <li class="etiqueta-inicio-li list-group-item bg-dark border-0 ">
        <a  class="etiquetas-inicio " href="{{ route("sitio.etiqueta", ["nombre" => $e->nombre]) }}">{{ $e->nombre }}</a>
    </li>
    @endforeach
</ul>

<!-- entre brakets  porque es una ruta dinamica,
       route() es una función de Laravel que genera una URL basada en el nombre de la ruta
       "sitio.etiqueta" es el nombre de la ruta definida en web.php
       
       ["nombre" => $e->nombre] es un array asociativo que pasa el parámetro "nombre" con el valor de $e->nombre
       "nombre" va entre comillas porque es del arreglo asociativo clave => valor -->

       <br>
       <br>
<div class="container d-flex flex-wrap justify-content-center">
    @foreach ($articulos as $a)
    <x-card 
        autor="{{ $a->usuario->nombre }}"
        id="{{ $a->id }}"
        imagen="{{ $a->portada }}"
        titulo="{{ $a->titulo }}"
        descripcion="{{ $a->descripcion }}">
    </x-card>
    @endforeach
</div>
@endsection("contenido")



<!-- 
                //  autor=" $a->usuario->nombre "  COMO SE HACE ESTA LINEA? O QUE HACE ESTO, AQUI TE EXPLICO 
    // $a->usuario accede a la relación entre el artículo y el usuario que lo creó. Esta relación está definida en el modelo Articulo.php:
            public function usuario(): BelongsTo {
                return this belongsToUserclass, usuario_id", "id");
                    }
            Eso significa que $a->usuario te da el usuario relacionado al artículo.
                Finalmente, $a->usuario->nombre accede al campo nombre del usuario.

    
    
    // Esto indica que este archivo hereda de main.blade.php
    en la etiqueta <a href=" route("sitio.etiqueta", "nombre" => $e->nombre]) "> $e->nombre </a>
    se utiliza la función route() para generar una URL basada en el nombre de la ruta "sitio.etiqueta", pasando el parámetro "nombre" con el valor de $e->
-->