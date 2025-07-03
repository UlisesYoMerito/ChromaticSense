@extends("layouts.main")


@section("titulo", "Formulario de registro")


@section("contenido")
    <div class="container mt-5 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <form class="formulario-registro col-lg-4 border rounded shadow p-4 bg-white border-0" action="{{ route("admin.registrar") }}" method="POST">
                
                
                {{ csrf_field() }}
                
                
                
                <h4 class="display-5 text-center m-0">Registro</h4>
                <hr class="my-4">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg">
                <br>
                <label for="correo">Correo electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control form-control-lg">
                <button class="boton-registro btn btn-lg btn-primary w-100 mt-4">Registrame</button>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() AS $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
    </div>
@endsection