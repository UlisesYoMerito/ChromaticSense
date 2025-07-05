@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")


<div class="container my-5 ">

    <h1 class="display-4 fw-bold">📃 Nuevo registro</h1>

    <form class="" enctype="multipart/form-data" action="{{ route('admin.articuloRegistrar') }}" method="post">
        <input type="hidden" name="id" value="{{ $articulo?->id }}">
        {{ csrf_field() }}
        <div class="bg-white rounded border shadow p-4">
            <div class="row">
                <div class="col-lg-8">
                    <label for="titulo" class="text-dark">Título del artículo</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" //required value="{{ $articulo?->titulo }}">
                </div>
                <div class="col-lg-4">
                    <label for="fecha" class="text-dark">Fecha</label>
                    <input type="datetime-local" class="form-control" name="fecha" id="fecha" //required value="{{ $articulo?->fecha_visualizacion }}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <span class="d-block text-dark">Etiquetas</span>
                    @foreach ($etiquetas as $e)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input text-dark" type="checkbox" value="{{ $e->id }}" id="etiqueta{{ $e->id }}" name="etiqueta[]" {{ $articulo?->etiquetas->where('id', $e->id)->count() ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="etiqueta{{ $e->id }}">
                            {{ $e->nombre }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <label for="portada" class="text-dark">URL de la portada</label>
                    <input type="file" class="form-control" accept=".jpg, .png, " name="portada" id="portada" //required  value="{{ $articulo?->portada }}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <label for="descripcion" class="text-dark">Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control" //required>{{ $articulo?->descripcion }}</textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <label for="contenido" class="text-dark">Contenido</label>
                    <textarea class="form-control editor" name="contenido" id="contenido" cols="30" rows="4"  //required>{{ $articulo?->contenido }}</textarea>
                </div>
            </div>
            <br>
            <div class="d-flex flex-wrap justify-content-between">
                <a href="" class="btn btn-light btn-lg">↩️ Volver al listado</a>
                <button class="btn btn-primary btn-lg">✅ Registrar</button>
            </div>
        </div>
    </form>
</div>

@endsection