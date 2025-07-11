@extends("layouts.main")

@section("titulo", "Formulario de categoría")

@section("contenido")
<div class="container my-5 ">
    <h1 class="display-4 fw-bold text-light">Categorías</h1>

    <form enctype="multipart/form-data" action="{{ route('admin.categoriaRegistrar') }}" method="post">
        <input type="hidden" name="id" value="{{ $categoria?->id }}">
        {{ csrf_field() }}
        <div class="bg-white rounded border shadow p-4">
            <div class="row">
                <div class="col-lg-8">
                    <label for="nombre" class="text-dark">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required value="{{ $categoria?->nombre }}">
                </div>

                <div class="col-lg-4">
                    <label for="portada_categoria" class="text-dark">Portada</label>
                    <input type="file" class="form-control" name="portada_categoria" id="portada_categoria">
                    @if($categoria?->portada_categoria)
                        <small class="text-muted">Ya existe: {{ $categoria->portada_categoria }}</small>
                    @endif
                </div>
            </div>

            <br><br>

            <div class="d-flex flex-wrap justify-content-between">
                <a href="{{ route('admin.adminInicio') }}" class="btn btn-light btn-lg">↩️ Volver al listado</a>
                <button class="btn btn-primary btn-lg">✅ Registrar</button>
            </div>
        </div>
    </form>
</div>
@endsection
