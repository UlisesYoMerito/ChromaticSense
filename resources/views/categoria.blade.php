@extends("layouts.main")

@section("titulo", "categoria")

@section("contenido")
<br>

<ul class="list-group list-group-horizontal mt-4 justify-content-center">
    @foreach($categorias AS $c)
    <li class="categoria-inicio-li list-group-item bg-dark border-0 ">
        <a  class="categoria-inicio " href="{{ route("sitio.categoria", ["nombre" => $c->nombre]) }}">{{ $c->nombre }}</a>
    </li>
    @endforeach
</ul>

<br>
    @if($categoriaActual)
   
 <h1 class="text-center fw-bold text-white my-4">
    <span class="text-warning">Artículos de la categoría:</span> "{{ $categoriaActual->nombre }}"
</h1>
@endif
<br>


<div class="container-fluid">
  <div id="lightgallery" class="row grid" data-masonry='{"itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
    <div class="grid-sizer col-12 col-sm-6 col-md-3"></div>

    @forelse ($articulos ?? [] as $articulo)
      @component('components.card', ['articulo' => $articulo]) @endcomponent
    @empty  
      <div class="col-12 text-center text-light py-5">
          <h3>No hay artículos disponibles</h3>
      </div>
    @endforelse
  </div>
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