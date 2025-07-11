@extends("layouts.main")


@section("titulo", "Artículos")



@section("contenido")
<div class=" container mt-5">
    <div class="row align-items center">
        <div class="col-md-6">
       </div>
        <div class=" col-md-6">
            <div class="container-articulos p-4 rounded  ">
                <h1 class="display-4 ">{{ $registro->titulo }}</h1>
                <p>{{ $registro->descripcion }}</p>
                <p>{{ $registro->contenido }}</p>
            </div>
        </div>
    </div>
</div>


@endsection


<!-- 

    //Esto es una version corta para hacer un llamado a la sección "titulo" del layout main.blade.php
    //con los brakets permitimos usar variables en php con blade 

   entonces cuando usamos  registro->titulo  estamos llamando a la variable titulo del objeto registro que es un articulo
   y cuando usamos  registro->contenido !! estamos llamando a la variable contenido del el extends("layouts.main") indica que este archivo hereda de main.blade.php
    
    objeto registro, y el uso de !! !! permite que se interprete el HTML dentro del contenido.
    Esto significa que si registro->contenido tiene etiquetas HTML (como <p>, <strong>, <a>, etc.), el navegador las interpretará y renderizará correctamente.


    layout, y el @section("titulo", "Artículos") define el título de la página.
    El @section("contenido") define el contenido principal de la página, que incluye el título    
-->