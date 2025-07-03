@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")


<div class="container-fluid my-5">

    <h1 class="display-4 fw-bold">📃 Artículos</h1>
    <div class="text-end mb-4">
        <a href="{{ route('admin.articuloFormulario') }}" class="btn btn-warning btn-lg">Nuevo formulario</a>
    </div>
    <table  class="table datatable table-bordered table-sm">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $r)
            <tr>
                <td>{{ $r->titulo }}</td>
                <td>{{ $r->descripcion }}</td>
                <td>{{ $r->created_at ?? "Sin fecha" }}</td>
                <td>
                    <a class="" href="{{ route('admin.articuloFormulario', ["id" => $r->id]) }}">✏️ Editar</a>
                    <form class="preguntar" method="POST" action="{{route('admin.articuloEliminar')}} ">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $r?->id }}">
                        <button type="button" class=" btn btn-sm bg-danger">Eliminar</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('js')
    <script>
        for (const nodo of document.querySelectorAll(".preguntar button")) {
            nodo.addEventListener("click", function(){
                let pregunta = confirm("Seguro de eliminar?")
                if(pregunta){
                    nodo.parentNode.submit();
                }
            })
            
        }
    </script>
@endsection