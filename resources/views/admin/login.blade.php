<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
    
</head>
<body>
    <div class="container vh-100 d-flex align-items-center ">
        <div class=" row justify-content-center w-100 " >
            <form class="formulario-inicioSesion col-lg-4 border rounded shadow p-4 border-0 " action="{{route('admin.entrar')}}" method="POST">
                {{ csrf_field() }}
                
                <h4 class="display-5 text-center mt-4 text-light">Iniciar sesión</h4>
                <hr class="my-4 text-dark">
                <label for="correo " class="text-light">Correo electrónico:</label>
                <input type="email" name="correo" id="correo" class="form-control form-control-lg">
                <br>
                <label for="contrasena" class="text-light">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control form-control-lg">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <br> 
                    <a href="{{route('sitio.obtenerDatos')}}" class="text-light">Recuperar contraseña</a>
                </div>
                <button class="boton-inicioSesion btn btn-lg w-50 mt-4 d-block mx-auto">Entrar</button>
            </form>
        </div>
    </div>


</body>
</html>