@extends("layouts.main")

@section("titulo", "Formulario de registro")

@section("contenido")

<div class="container my-5 ">

    <h1 class="display-4 fw-bold ">📃 Nuevo registro</h1>

    <form enctype="multipart/form-data" action="{{ route('admin.articuloRegistrar') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $articulo?->id }}">

        <div class="bg-white rounded border shadow p-4">
            {{-- Título y Fecha --}}
            <div class="row">
                <div class="col-lg-8">
                    <label for="titulo" class="text-dark">Título del artículo</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" required value="{{ old('titulo', $articulo?->titulo) }}">
                </div>
                <div class="col-lg-4">
                    <label for="fecha" class="text-dark">Fecha</label>
                    <input type="datetime-local" class="form-control" name="fecha" id="fecha" required value="{{ old('fecha', $articulo?->fecha_visualizacion) }}">
                </div>
            </div>

            <br>

            {{-- Categoría --}}
            <div class="row">
                <div class="col-lg-12">
                    <label for="categoria_id" class="text-dark">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-select" required>
                        <option value="">-- Selecciona una categoría --</option>
                        @foreach ($categorias as $cat)
                            <option value="{{ $cat->id }}"
                                {{ $articulo?->categoria_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>

            {{-- Portada --}}
            <div class="row">
                <div class="col-lg-12">
                    <label for="portada" class="text-dark">Portada</label>
                    <input type="file" class="form-control" accept=".jpg,.jpeg,.png" name="portada" id="portada" {{ !$articulo ? 'required' : '' }}>
                    
                    @if ($articulo?->portada)
                        <div class="mt-2">
                            <p class="mb-1">Portada actual:</p>
                            <img src="{{ asset('storage/' . $articulo->portada) }}" alt="Portada actual" style="max-width: 200px; border-radius: 8px;">
                        </div>
                    @endif
                </div>
            </div>

            <br>

            {{-- Descripción --}}
            <div class="row">
                <div class="col-lg-12">
                    <label for="descripcion" class="text-dark">Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control" required>{{ old('descripcion', $articulo?->descripcion) }}</textarea>
                </div>
            </div>

            <br>

            {{-- Contenido --}}
            <div class="row">
                <div class="col-lg-12">
                    <label for="contenido" class="text-dark">Contenido</label>
                    <textarea class="form-control editor" name="contenido" id="contenido" cols="30" rows="4" required>{{ old('contenido', $articulo?->contenido) }}</textarea>
                </div>
            </div>

            <br>

            {{-- Botones --}}
            <div class="d-flex flex-wrap justify-content-between">
                <a href="{{ route('admin.articuloRegistros') }}" class="btn btn-light btn-lg">↩️ Volver al listado</a>
                <button class="btn btn-primary btn-lg">✅ Guardar</button>
            </div>
        </div>
    </form>
</div>

@endsection
