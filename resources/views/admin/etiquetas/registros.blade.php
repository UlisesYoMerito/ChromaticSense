@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")


<div class="container-fluid my-5">

    <h1 class="display-4 fw-bold"> Registro etiquetas</h1>
    <div class="text-end mb-4">
        <a href="{{ route('admin.etiquetaFormulario') }}" class="btn btn-warning btn-lg">Nuevo formulario </a>
    </div>
    <table  class="table datatable table-bordered table-sm">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrosEtiquetas as $rE)
            <tr>
                <td>{{ $rE->nombre }}</td>
                <td>{{ $rE->created_at ?? "Sin fecha" }}</td>
                <td>
                    <a class="" href="{{ route('admin.etiquetaFormulario', ["id" => $rE->id]) }}">✏️ Editar</a>
                    <form class="preguntar" method="POST" action="{{route('admin.etiquetaEliminar')}} ">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $rE?->id }}">
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