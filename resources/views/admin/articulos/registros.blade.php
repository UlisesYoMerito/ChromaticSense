@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")


<div class="container my-5">

    <h1 class="display-4 fw-bold text-light">📃 Artículos</h1>
    <div class="text-end mb-2">
        <a href="{{ route('admin.articuloFormulario') }}" class="btn btn-warning btn-md">Nuevo formulario</a>
    </div>

    <div class="tabla-articulos">
        <table class=" justify-cottent-center table datatable table-bordered table-sm table-hover">
            <thead>
                <tr>
                    <th style="width: 10%">Título</th>
                    <th style="width: 10%">Portada</th>
                    <th style="width: 50%">Descripción</th>
                    <th style="width: 15%">Fecha de creación</th>
                    <th style="width: 15%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $r)
                <tr>
                    <td>{{ $r->titulo }}</td>
                    <td>
                        @if(Str::startsWith($r->portada, ['http://', 'https://']))
                        <img class="d-block mx-auto rounded" src="{{ $r->portada }}" alt="Portada" style="max-width: 80px; max-height: 80px;">
                        @else
                        <img class="d-block mx-auto rounded" src="{{ asset('storage/' . $r->portada) }}" alt="Portada" style="max-width: 80px; max-height: 80px;">
                        @endif
                    </td>
                    <td>{{ $r->descripcion }}</td>
                    <td>{{ $r->created_at ?? "Sin fecha" }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-4">
                            <a class="ms-2 btn btn-sm bg-primary text-light " href="{{ route('admin.articuloFormulario', ["id" => $r->id]) }}">✏️ Editar</a>
                            <form class="preguntar" method="POST" action="{{route('admin.articuloEliminar')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $r?->id }}">
                                <button type="button" class="btn btn-sm bg-dark text-danger fw-bold"> ⛔Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
            let pregunta = confirm("Seguro de eliminar?")
            if (pregunta) {
                nodo.parentNode.submit();
            }
        })

    }
</script>
@endsection