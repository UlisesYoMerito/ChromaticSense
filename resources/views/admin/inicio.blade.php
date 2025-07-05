@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")


<div class="container-fluid my-5">
    <h1 class="display-4 fw-bold"> Panel de administrador</h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="border rounded p-4 shadow-sm">
                <h4 class="fw-bold">📃 Artículos</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <h6 class="fw-bold text-muted ">Registros</h6>
                        <span class="badge bg-light text-dark">{{ $articulos }}</span>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{ route('admin.articuloRegistros') }}" class="btn btn-lg btn-light border w-100">🔍Consultar registros</a>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{ route('admin.articuloFormulario') }}" class="btn btn-info btn-lg w-100">✏️ Nuevo registro</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="border rounded p-4 shadow-sm">
                <h4 class="fw-bold">🏷️ Etiquetas</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <h6 class="fw-bold text-muted">Registros</h6>
                        <span class="badge bg-dark text-white">{{ $etiquetas }}</span>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{route('admin.etiquetasRegistros')}}" class="btn btn-lg btn-light border w-100">🔍 Consultar registros</a>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{route('admin.etiquetaFormulario')}}" class="btn btn-info btn-lg w-100">✏️ Nuevo registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection