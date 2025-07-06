@extends("layouts.main")

@section("titulo", "Etiqueta")

@section("contenido")
<h1 class="text-center fw-bold text-white my-4  ">Etiquetas y sus Artículos</h1>
<div class="container d-flex flex-wrap justify-content-center">
    @forelse ($articulos ?? [] as $a)
    <x-card
        autor="{{ $a->usuario->nombre }}"
        id="{{ $a->id }}"
        imagen="{{ $a->portada }}"
        titulo="{{ $a->titulo }}"
        descripcion="{{ $a->descripcion }}">
    </x-card>
    @empty  
    <h1 class="text-center">No hay artículos con esta etiqueta</h1>
    @endforelse
</div>
@endsection



<!-- 
    en empy dice que si no hay artículos, se mostrará el mensaje

    Este código es una vista de Laravel que muestra una lista de artículos asociados a una etiqueta específica.
    
    - extends"layouts . main" indica que esta vista hereda de un layout principal llamado "main".
    
    - section("titulo", "Etiqueta") define el título de la página como "Etiqueta".
    
    - section("contenido") define el contenido principal de la página, que incluye un encabezado grande y una lista de artículos.
    
    -1forelse se utiliza para iterar sobre la colección de artículos. Si hay artículos disponibles, se renderiza un componente personalizado x-card para cada uno.
    
    - Cada componente x-card recibe propiedades como autor, id, imagen, título y descripción del artículo.

    - Si no hay artículos disponibles, se muestra un mensaje indicando que no hay artículos con esa etiqueta.

    - Se utiliza un componente personalizado x-card para mostrar cada artículo, pasando propiedades como autor, id, imagen, título y descripción.
    
    - Si no hay artículos disponibles, se muestra un mensaje indicando que no hay artículos con esa etiqueta.
 -->