@extends("layouts.main")


@section("titulo", "Artículos")



@section("contenido")
    
    <h3 class="text-center text-light"> Resultados con la busqueda: <span >{{ request('busqueda') }}</span><h3>
    <br>
        <div class="container-fluid d-flex flex-wrap justify-content-center">
            @forelse ($buscandoAndo ?? [] as $a)
            <x-card
                autor="{{ $a->usuario->nombre }}"
                id="{{ $a->id }}"
                imagen="{{ $a->portada }}"
                titulo="{{ $a->titulo }}"
                descripcion="{{ $a->descripcion }}">
            </x-card>
            @empty
            <h3 class="text-center">No hay artículos realcionado con la busqueda <h3>
                    @endforelse
        </div>
        <div class="container d-flex justify-content-center mt-5">
            {{ $buscandoAndo->appends(['busqueda' => request('busqueda')])->links('pagination::bootstrap-5') }}

        </div>




        @endsection


        <!-- 

    el extends("layouts.main") indica que este archivo hereda de main.blade.php
    
    el section("titulo", "Artículos") define el título de la página.
    
    el section("contenido") define el contenido principal de la página, que incluye el título y la imagen del personaje.
    
    Esto significa que cuando se renderiza esta vista, se mostrará un título grande "Artículo" y debajo se mostrará el nombre del personaje y su imagen.

-->