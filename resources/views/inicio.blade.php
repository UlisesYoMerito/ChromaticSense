@extends("layouts.main")

@section("titulo", "Mi sitio web de Laravel")

@section("contenido")

<div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($categoria as $index => $c)
    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
      <img src="{{ asset('storage/' . $c->portada_categoria) }}" class="d-block w-100" alt="{{ $c->nombre }}">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="title">{{ $c->nombre }}</h2>
        <p class="description">Explora más sobre {{ $c->nombre }} en nuestro blog.</p>
        <a href="{{ route('sitio.categoria', ['nombre' => $c->nombre]) }}" class="btn btn-light">Ver más</a>
      </div>
    </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>





@endsection