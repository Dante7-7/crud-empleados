<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Registro</title>
    <style>
        /*esto trae la imagen de la carpeta img que esta en la carpeta public */
        :root {
            --bg-url: url("{{ asset('img/img.jpg') }}");
        }
    </style>
</head>
<body>
    <!--formulario para la creacion de usuario o administrador -->
<div class="login-page">
    <div class="form">
        <!--ruta del controlador user-->
        <form class="login-form" method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Regístrate</h1>
            <img src="{{ asset('img/catregis.png') }}" height="120px" width="120px;"><br>
            <!--input de ingreso de datos del usuario o administrador -->
            <input type="text" placeholder="Nombre de usuario" name="name" id="N_Usuario" required/>
            <input type="email" placeholder="Email" name="email" id="Email" required/>
            <input type="password" placeholder="Contraseña" name="password" id="contraseña" required/>
            <input type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required/><br>
            <button type="submit">Crear</button>
            <!--me lleva de regreso a login-->
            <p class="message">¿Ya registrado? <a href="{{ route('login') }}">Iniciar sesión</a></p>
        </form>
    </div>
</div>
</body>
</html>
