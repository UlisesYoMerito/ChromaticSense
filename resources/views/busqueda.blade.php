
@extends("layouts.main")


@section("titulo", "Artículos")


@section("contenido")
<h1 class="display-1 fw-bold text-white bg-dark">Artículo</h1>

<h3>{{ $nombre_personaje }}</h3>
<img src="{{ $imagen_personaje }}" alt="">
@endsection


<!-- 

    el @extends("layouts.main") indica que este archivo hereda de main.blade.php
    
    el @section("titulo", "Artículos") define el título de la página.
    
    el @section("contenido") define el contenido principal de la página, que incluye el título y la imagen del personaje.
    
    Esto significa que cuando se renderiza esta vista, se mostrará un título grande "Artículo" y debajo se mostrará el nombre del personaje y su imagen.

-->