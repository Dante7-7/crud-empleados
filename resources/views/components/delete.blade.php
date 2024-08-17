<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Correo</th>
                <th>imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
            <tr>
                <td>{{$persona->id}}</td>
                <td>{{$persona->name}}</td>
                <td>{{$persona->lastname}}</td>
                <td>{{$perdona->fecha_de_nacimiento}}</td>
                <td>{{$persona->email}}</td>
                <td>{{$perdona->imagen}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>