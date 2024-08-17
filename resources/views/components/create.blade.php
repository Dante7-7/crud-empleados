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
            <form action="{{ route('personas.store')}}" method="post" enctype="multipart/form-data">  
                @csrf 
                <input type="text" class="ingresa" name="name" placeholder="Name" required><br><br>
                <input type="text" class="ingresa" name="lastname" placeholder="Lastename" required><br><br>
                <input type="date" class="ingresa" name="fecha_de_nacimiento" required><br><br>
                <input type="text" class="ingresa" name="email" placeholder="Email" required><br><br>
                <label for="imagen" class="custom-file-upload">Seleccionar archivo</label>
                <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
                <img id="preview" src="" alt="Vista previa de la imagen" style="display:none; max-width: 100px; max-heigth:50px"><br><br>
                <button type="submit">Guardar</button>
                <button><a href="{{ route('personas.index')}}">Cancelar</a></button><br><br>
            </form>
        </div>    
    </center>

    <script>
        document.getElementById('imagen').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>