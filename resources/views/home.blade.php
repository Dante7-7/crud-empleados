<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/fontawesome@6.0.0-alpha3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>proyecto Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        :root {
            --bg-url: url("{{ asset('img/img.jpg') }}");
        }
        .pdf{
            display: flex;
            flex-direction: initial


        }
        .conte-cerrar{
            width: 50px;
        }
        h1{
            margin: 10px;
            color: white;
        }


    </style>
</head>

<body>
    <header>
        

    
        <h1>Bienvenido</h1>
        <form action="{{ route('personas.index') }}" method="GET" class="buscador">
            <div class="conte">
                <input type="text" name="search" class="input_bus" placeholder="Buscar usuario">
                <div class="input-group-append">
                    <button type="submit" class="btn_bus"><i class="fas fa-search"></i></button>
                    <button class="btn_eli" type="button" onclick="limpiarBusqueda()"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </form>

       <form action="{{route('pdftodos')}}" style="margin:30px" target="_blank">
            <div class="pdf">
                <h5 style="color: white">Archivo PDF Empleados</h1>
                <button type="submit"  class="btn-e-a" ><i class="fas fa-scroll" style="color: #ffffff;"></i></button>
            </div>
        </form>

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                usuario
            </a>
            <ul class="dropdown-menu">
                <li class="conte-cerrar">
                    <button class="dropdown-item logout" onclick="window.location.href='{{ asset('/') }}'">
                        Cerrar sesión
                    </button>
                </li>
            </ul>
        </div>
       <!-- <div class="dropdown"><a href="#" class="dropdown-toggle" onclick="toggleDropdown()">Usuario</a><ul class="dropdown-menu" id="dropdownMenu"><li><button class="logout" onclick="logout()">Cerrar sesión</button></li></ul></div>-->
    
    </header>
    <center>


            <div>
                <button class="bton"><a href="{{ route('personas.create')}}" style="color:white;text-decoration: none;"><i class="fa fa-book"></i> Agregar Usuario</a></button>
            </div>
        <h1>Tabla personas</h1>
        
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Actualizar</th>
                        <th scope="col">PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                    <tr class="sti_tr">
                        <td>{{$registro->id}}</td>
                        <td> <img src="{{ Storage::url($registro->imagen) }}"  style="width: 70px;max-height:50px;object-fit: cover;"></td>
                        <td>{{$registro->name}}</td>
                        <td>{{$registro->lastname}}</td>
                        <td>{{$registro->fecha_de_nacimiento}}</td>
                        <td>{{$registro->email}}</td>
                        <td>
                            <form action="{{ route('personas.destroy', $registro->id)}}" method="post" id="deleteForm">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn-e-a" onclick="showCustomConfirm()"><i class="fas fa-trash" style="color:#ffff"></i></button>
                            </form>
                        </td>

                        <div id="customConfirm" class="custom-confirm">
                            <div class="confirm-content">
                                <h3>¿Estás seguro de que quieres eliminar esta persona?</h3>
                                <img class="imgp" src="/img/catcompu1.png" alt="Descripción de la imagen" srcset=""><br><br>
                                <div class="btn-container">
                                    <button class="btn_elimina"id="confirmYes">Sí</button>
                                    <button class="btn_elimina" id="confirmNo">No</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Mostrar la ventana de confirmación personalizada
                            function showCustomConfirm() {
                                document.getElementById('customConfirm').style.display = 'block';
                            }

                            // Ocultar la ventana de confirmación personalizada
                            function hideCustomConfirm() {
                                document.getElementById('customConfirm').style.display = 'none';
                            }

                            // Acción al hacer clic en "Sí"
                            document.getElementById('confirmYes').addEventListener('click', function() {
                                document.getElementById('deleteForm').submit(); // Enviar el formulario
                            });

                            // Acción al hacer clic en "No"
                            document.getElementById('confirmNo').addEventListener('click', function() {
                                hideCustomConfirm(); // Ocultar la ventana de confirmación
                            });

                             // Función para limpiar el campo de búsqueda
                            function limpiarBusqueda() {
                                document.querySelector('input[name="search"]').value = '';
                                document.querySelector('form[action="{{ route('personas.index') }}"]').submit();
                            }

                        </script>
                        <td>
                            <form action="{{ route('personas.edit', $registro->id)}}">
                                @csrf
                                <button type="submit" class="btn-e-a"><i class="fa fa-pen" style="color:#ffffff;"></i></button>

                            </form>
                            
                        </td>
                        <td>
                            <form action="{{route('pdf',$registro->id)}}" target="_blank">
                                <button type="submit"  class="btn-e-a"><i class="fas fa-scroll" style="color: #ffffff;"></i></button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center  custom-pagination">
            {!! $registros ->links() !!}
            </div>
    </center>
    <script>
        document.getElementById('btnActualizar').addEventListener('click', function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                keyboard: false
            });
            myModal.show();
        });
    </script>
    <!-- js del boton cerrar cesion-->
    <script>functiontoggleDropdown() {
        const dropdown = document.querySelector('.dropdown');
        dropdown.classList.toggle('open');
    }

    functionlogout() {
        if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
            window.location.href = '{{ route('login') }}';
        }
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle')) {
            const dropdown = document.querySelector('.dropdown');
            if (dropdown.classList.contains('open')) {
                dropdown.classList.remove('open');
            }
        }
    }
</script>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
<html>