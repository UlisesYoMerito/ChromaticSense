@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")


<div class="container my-5 ">

    <h1 class="display-4 fw-bold">Etiquetas</h1>

    <form class="" enctype="multipart/form-data" action="{{route('admin.etiquetaRegistrar')}}" method="post">
        <input type="hidden" name="id" value="{{ $etiqueta?->id }}">
        {{ csrf_field() }}
        <div class="bg-white rounded border shadow p-4">
            <div class="row">
                <div class="col-lg-8">
                    <label for="titulo" class="text-dark">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required value="{{ $etiqueta?->nombre }}">
                </div>
            </div>
            <br>
            <br>
            <div class="d-flex flex-wrap justify-content-between">
                <a href="" class="btn btn-light btn-lg">↩️ Volver al listado</a>
                <button class="btn btn-primary btn-lg">✅ Registrar</button>
            </div>
        </div>
    </form>
</div>

@endsection