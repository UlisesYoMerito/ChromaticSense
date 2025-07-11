@extends("layouts.main")

@section("titulo", "Todas las Fotos")

@section("contenido")
<br>

<ul class="list-group list-group-horizontal mt-4 justify-content-center">
    @foreach($categorias AS $c)
    <li class="categoria-inicio-li list-group-item bg-dark border-0 ">
        <a class="categoria-inicio" href="{{ route('sitio.categoria', ['nombre' => $c->nombre]) }}">{{ $c->nombre }}</a>
    </li>
    @endforeach
</ul>


<h1 class="text-light text-center px-3 py-5 rounded">Todas las Fotos</h1>

<div class="container-fluid">
  <div id="lightgallery" class="row grid"
       data-masonry='{"itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
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

