




<div class="card-aspecto card {{ $clases ?? '' }} m-2" style="width: 20rem;">
  <img src="{{ $imagen }}" class="imagen-card-articulo imagen-card card-img-top" alt="...">
  <div class="card-body  ">
    <span class="badge bg-dark text-white float-end">{{ $autor }}</span>
    <h5 class="h5-titulo card-title">{{ $titulo }}</h5>
    <p class="p-descripcion card-text">{{ $descripcion }}</p>
    <a href="{{ route("sitio.sistemaArticulo", ["id" => $id]) }}" class="a-leer-nota btn ">Leer nota</a>
  </div>
</div>

<!-- 
    
    Si $clases está definido, se añade; si no, se pone una cadena vacía.
    
-->