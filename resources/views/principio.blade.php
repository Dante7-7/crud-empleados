<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Hamburguesa</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/027/147/722/original/cute-cat-in-hamburger-cartoon-elements-pro-png.png" type="">

    <link rel="stylesheet" href="{{asset('css/principio.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <style>
        :root {--bg-url: url("{{ asset('img/img.jpg') }}");}

         /*este le da color al boton de cerrar sesion */
         .dropdown-menu{
            background:  #8b77b9;
        }
        .dropdown-container {
            position: absolute;
            top: 10px;
            right: 25px;
            margin: 10px; /* Ajusta el margen según sea necesario */
        }
        /*color de la letras del boton o etiqueta (a)*/
        .btna{
            color:white;
            font-weight: bolder;
            
        }
        /*esto quita el borde que sale por defecto en los botones de boostrac */
        .btna:focus,
        .btna:active{
            color: white; /* Mantén el color del texto */
            border: 0px solid transparent;
        }

        .btna:hover{
            color:white;
        }

        .dropdown-item{
            color:white;
            font-weight: bolder;
        }
        .dropdown-item:hover{
            background:  #8b77b9;
            color:white;
        }

        h1{
            margin: 10px;
            color: white;
        }

    </style>
</head>
<body>
    <div class="container">
        <img src="{{asset('img/logocat.png') }}" style="height:300px;">

        <div class="dropdown dropdown-container">
            <a class="btn dropdown-toggle btna" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle">  {{ Auth::user()->name }}</i> 
            </a>
            <ul class="dropdown-menu" >
                <li class="conte-cerrar" >
                    <button class="dropdown-item" onclick="window.location.href='{{ asset('/') }}'" >
                    <i class="fas fa-door-open">  Cerrar sesion</i>
                    </button>
                </li>

            </ul>
        </div>

    </div>
    
    <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/dashboard.svg" class="list__img">
                    <a href="{{ asset('/') }}" class="nav__link">Inicio</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets/docs.svg" class="list__img">
                    <a href="#" class="nav__link">Productos</a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="{{ route('categorias.index') }}" class="nav__link nav__link--inside">Categorias</a>
                    </li>

                    <li class="list__inside">
                        <a href="{{ route('productos.create') }}" class="nav__link nav__link--inside">Crear Producto</a>
                    </li>
                </ul>

            </li>


            <li class="list__item">
                <div class="list__button">
                    <img src="assets/stats.svg" class="list__img">
                    <a href="#" class="nav__link">Servicios</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets/bell.svg" class="list__img">
                    <a href="#" class="nav__link">Pedidos</a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">link vacio</a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Pedidos Pendientes </a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Nuevos Pedido </a>
                    </li>

                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Reporte de Pedidos  </a>
                    </li>
                </ul>

            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/message.svg" class="list__img">
                    <a href="{{route('personas.store')}}" class="nav__link" >Clientes</a>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/message.svg" class="list__img">
                    <a href="#" class="nav__link">Contacto</a>
                </div>
            </li>

        </ul>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>