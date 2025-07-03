<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('titulo')</title>
  @vite(["resources/css/app.css", "resources/js/app.js"])

  @yield('css')
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark mi-barra">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blogy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('sitio.home')}}">{{ __("sitio.nav_inicio") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('sitio.todasEtiquetas')}}">{{ __("sitio.nav_etiquetas") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('sitio.todosArticulos')}}">{{ __("sitio.nav_articulos") }}</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <form class="d-flex" role="search">
              <input class="form-control me-2 w-50" type="search" placeholder="{{ __("sitio.nav_texto_busqueda") }}" aria-label="Search" />
              <button class="btn btn-light" type="submit">{{ __("sitio.nav_boton_busqueda") }}</button>
            </form>
          </li>
          @if(Auth::user())
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin.logout') }}">Cerrar sesión</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin.login') }}">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('admin.registro') }}">Registro</a>
            </li>
            @endif
        </ul>

      </div>
    </div>
  </nav>
  @yield('contenido')

  @yield('js')
  @include('sweetalert::alert')

</body>

</html>
<!--
              este yield('contenido') esta debajo del nav que es donde se agregan los articulos 
              y el contenido de cada vista que extienda este layout
            -->