@extends("layouts.main")


@section("titulo", "Cambio de contraseña")


@section("contenido")
  <div class="container vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <!--  <x-captcha-js /> -->
            <form class="formulario-inicioSesion col-lg-4 border rounded shadow p-4 border-0" action="{{route('sitio.enviarComprobacion')}}" method="POST">
                {{ csrf_field() }}
                
                <h4 class="display-5 text-center mt-4 text-light">Recuperacion Contraseña</h4>
                <hr class="my-4 text-dark">
                
                <div class="mb-3">  <!-- CORREO -->
                    <label for="correo" class="form-label text-light">Correo:</label>
                    <input type="email" name="correo" id="correo" class="form-control form-control-lg" required>
                </div>
                <!--  <x-captcha-container /> -->
                <button type="submit" class="boton-inicioSesion btn btn-lg w-100 mt-3 py-2">Validar</button>
            </form>
        </div>
    </div>
@endsection