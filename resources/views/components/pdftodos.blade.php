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
    <title>PDF De Todos Los Empleados</title>

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
    </style>
</head>
<body>
    <center>
        <img src="{{public_path('img/imagenphp.png') }}"><br><br><br>
    <h1>Lista de Empleados</h1>
    <table class="table table-striped table-hover" style="text-align: center;">
        <thead>
            <tr style=" fon-size:30px">
                <th scope="col">Id</th>
                <!--<th scope="col">Imagen</th>-->
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Correo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($perso as $registro)
            <tr class="sti_tr">
                
                <td>{{$registro->id}}</td>
                <!--<td> <img src="{{ Storage::url($registro->imagen) }}"  style="width: 70px;max-height:50px;object-fit: cover;"></td>-->
                <td>{{$registro->name}}</td>
                <td>{{$registro->lastname}}</td>
                <td>{{$registro->fecha_de_nacimiento}}</td>
                <td>{{$registro->email}}</td>
            
            </tr>
            @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>