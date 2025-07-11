@extends("layouts.main")

@section("titulo", "Formulario de registro")

@section("contenido")
<div class="container-fluid my-5">
    <h1 class="display-4 fw-bold text-light">Panel de administrador</h1>
    <div class="row">
        <!-- Artículos -->
        <div class="col-lg-6">
            <div class="border rounded p-4 shadow-sm bg-light">
                <h4 class="fw-bold">📃 Artículos</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <h6 class="fw-bold text-muted">Registros</h6>
                        <span class="badge bg-light text-dark">{{ $articulos }}</span>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{ route('admin.articuloRegistros') }}" class="btn btn-lg btn-light border w-100">🔍 Consultar registros</a>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{ route('admin.articuloFormulario') }}" class="btn btn-info btn-lg w-100">✏️ Nuevo registro</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categorías (antes Etiquetas) -->
        <div class="col-lg-6">
            <div class="border rounded p-4 shadow-sm bg-light">
                <h4 class="fw-bold">📂 Categorías</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <h6 class="fw-bold text-muted">Registros</h6>
                        <span class="badge bg-dark text-white">{{ $categorias }}</span>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{ route('admin.categoriasRegistros') }}" class="btn btn-lg btn-light border w-100">🔍 Consultar registros</a>
                    </div>
                    <div class="col-lg-5">
                        <a href="{{ route('admin.categoriaFormulario') }}" class="btn btn-info btn-lg w-100">✏️ Nuevo registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
