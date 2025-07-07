@extends("layouts.main")


@section("titulo", "Cambio de contraseña")


@section("contenido")

<div class="container mt-5 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <x-captcha-js />
        <form class="formulario-registro col-lg-8 border rounded shadow p-4 bg-white border-0" action="{{ route("sitio.ActualizarContrasena")}}" method="POST">
            {{ csrf_field() }}
            <h4 class="display-5 text-center m-0">Actualizacion de contraseña</h4>
            <hr class="my-4">
            <div class="row">
                <div class="col-lg-4">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo"  class="form-control form-control-lg" value="{{ Auth::User()->email }}" readonly required>
                </div>
                <div class="col-lg-4">
                    <label for="contrasenaActual">Contraseña Actual</label>
                    <input type="password" name="contrasenaActual" class="form-control form-control-lg" value="" required>
                </div>
                <div class="col-lg-4">
                    <label for="contrasenaNueva">Nueva Contraseña</label>
                    <input type="password" name="contrasenaNueva" class="form-control form-control-lg" required>
                </div>
            </div>
            <x-captcha-container />
            <button  class="boton-registro btn btn-lg btn-primary w-100 mt-4">Actualizar</button>

        </form>
    </div>
</div>
@endsection