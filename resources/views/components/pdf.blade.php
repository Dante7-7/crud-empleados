<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fontawesome@6.0.0-alpha3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>PDF</title>

    <style>
        h1{
            color: red;
        }
        img{
            display: flex;
            float: left;
            width: 70px;
            height:70px;
            border-radius: 10px; 
        }
        p{
            font-size: 20px;
            font-family: Montserrat-Regular;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
        }
        .titulo{
            height: 40px;
            display: inline;
            text-align: center;
            font-weight: bolder;
            color: #110d17;
            

    
        }
        .usuario{
            height: 40px;
            text-align: center;
            display: inline;
            color: #110d17;
            
            
        }
        .info{

            
            margin:70px;
        }
    </style>
</head>
<body>
    <center>
        <img src="{{public_path('img/imagenphp.png') }}"><br><br>

    <h1>Informacion de Empleado</h1>


        <div>
            <article class="info">
                <p class="titulo">Id:</p>

                <p class="usuario">{{$pers->id}}</p>
            </article>
            <article class="info">
                <p class="titulo">Nombre:</p>

                <p class="usuario">{{$pers->name}}</p>
            </article>
            <article class="info">
                <p class="titulo">Apellido:</p>

                <p class="usuario">{{$pers->lastname}}</p>
            </article>
            <article class="info">
                <p class="titulo">Fecha de nacimiento:</p>

                <p class="usuario">{{$pers->fecha_de_nacimiento}}</p>
            </article>
            <article class="info">
                <p class="titulo">Email:</p>

                <p class="usuario">{{$pers->email}}</p>
            </article>
        </div>
    </center>
</body>
</html>