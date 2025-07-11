<div class="grid-item col-12 col-sm-6 col-md-3">
  <a href="{{ asset('storage/' . $articulo->portada) }}" title="{{ $articulo->titulo }}">
    <img src="{{ asset('storage/' . $articulo->portada) }}" 
         class="img-fluid rounded mb-3 imagen-miniatura" style="cursor: pointer;" alt="{{ $articulo->titulo }}">
  </a>
</div>
