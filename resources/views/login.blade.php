<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
    <style>
        :root {
            --bg-url: url("{{ asset('img/img.jpg') }}");
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <h1>Bienvenido usuario</h1>
        <img src="{{ asset('img/catlogin.png') }}" height="120px" width="120px;"><br>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="email" placeholder="Correo Electrónico" name="email" id="email" required>
        <input type="password" placeholder="Contraseña" name="password" id="password" required><br>
        <button type="submit">Iniciar</button>
        <p class="message">¿No registrado? <a href="{{ route('register') }}">Crea una cuenta</a></p>
    </form>
  </div>
</div>
</body>
</html>
