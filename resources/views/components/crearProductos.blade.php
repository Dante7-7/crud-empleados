<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>crear</title>
    <style>
        :root {
            --bg-url: url("{{ asset('img/img.jpg') }}");
        }
    </style>
</head>
<body>
    <center>
        <div>
            <h1>crear</h1>
            <img src="{{asset('img/cathambur.png') }}" style="height:150px;">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="ingresa" name="nombre" placeholder="Nombre" required><br><br>
                <input type="text" class="ingresa" name="descripcion" placeholder="Descripcion" required><br><br>
                <input type="number" step="0.01" class="ingresa" name="precio" placeholder="Precio" required><br><br>
                <input type="number"  class="ingresa" name="cantidad_en_stock" placeholder="Cantidad en stock" required><br><br>
                <button type="submit">Crear Producto</button><br><br><br>
            </form>

        </div>    
    </center>

</body>
</html>