@extends("layouts.main")

@section("titulo", "Etiquetas y Artículos")

@section("contenido")
<h1 class="text-center fw-bold text-white my-4  ">Etiquetas y sus Artículos</h1>
<div class="container my-4">
    @forelse($etiquetas as $etiqueta)
        <div class="mb-5">
            <h2 class="text-light px-3 py-5 rounded">{{ $etiqueta->nombre }}</h2>
            <div class="d-flex flex-wrap gap-3">
                @forelse($etiqueta->articulos as $a)
                    <x-card
                        autor="{{ $a->usuario->nombre ?? '' }}"
                        id="{{ $a->id ?? '' }}"
                        imagen="{{ $a->portada ?? '' }}"
                        titulo="{{ $a->titulo ?? '' }}"
                        descripcion="{{ $a->descripcion ?? '' }}">
                    </x-card>
                @empty
                    <span class="text-muted">No hay artículos para esta etiqueta.</span>
                @endforelse
            </div>
        </div>
    @empty
        <h3 class="text-center">No hay etiquetas registradas.</h3>
    @endforelse
</div>
@endsection
