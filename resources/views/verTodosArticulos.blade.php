@extends("layouts.main")

@section("titulo", "Todos los Artículos")

@section("contenido")
<h1 class="text-light text-center px-3 py-5 rounded">Todos los Artículos</h1>
<div class="container d-flex flex-wrap justify-content-center">
    @forelse ($articulos ?? [] as $a)
    <x-card
        autor="{{ $a->usuario->nombre  }}"
        id="{{ $a->id  }}"
        imagen="{{ $a->portada  }}"
        titulo="{{ $a->titulo  }}"
        descripcion="{{ $a->descripcion  }}">
    </x-card>
    @empty  
    <h1 class="text-center">No hay artículos disponibles</h1>
    @endforelse
</div>
@endsection
