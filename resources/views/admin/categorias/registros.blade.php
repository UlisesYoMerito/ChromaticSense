@extends("layouts.main")

@section("titulo", "Registro de categorías")

@section("contenido")
<div class="container-fluid my-5">
    <h1 class="display-4 fw-bold text-light">Registro de categorías</h1>

    <div class="text-end mb-4">
        <a href="{{ route('admin.categoriaFormulario') }}" class="btn btn-warning btn-lg">Nueva categoría</a>
    </div>

    <table class="table datatable table-bordered table-sm">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrosCategorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->created_at ?? "Sin fecha" }}</td>
                <td>
                    <a href="{{ route('admin.categoriaFormulario', ["id" => $categoria->id]) }}">✏️ Editar</a>
                    <form class="preguntar d-inline" method="POST" action="{{ route('admin.categoriaEliminar') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $categoria->id }}">
                        <button type="button" class="btn btn-sm bg-danger text-white">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>

<div class="d-flex flex-wrap justify-content-between">
    <a href="{{ route('admin.adminInicio') }}" class="btn btn-light btn-lg">↩️ Volver al panel</a>
</div>
@endsection

@section('js')
<script>
    for (const nodo of document.querySelectorAll(".preguntar button")) {
        nodo.addEventListener("click", function() {
            let pregunta = confirm("¿Seguro que deseas eliminar esta categoría?");
            if (pregunta) {
                nodo.parentNode.submit();
            }
        });
    }
</script>
@endsection