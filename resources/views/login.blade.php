<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login</title>
        <style>
            :root {
                --bg-url: url("{{ asset('img/img.jpg') }}");
            }
            h1{
                font-size: x-large;
                font-weight: 900; 
                color: white;
            }
            .error {
                color: red;
                margin-bottom: 15px;
            }
            .modal {
                z-index: 1057; /* Bootstrap por defecto */
            }
            .modal-backdrop {
                z-index: 1050; /* Backdrop debe estar debajo del modal */
            }

            .modal-content,.modal-header,.modal-body,.modal-footer{
                
                background:  #d8d0e7;
                backdrop-filter: blur(20px);
                box-shadow: 0 0 16px rbga(0,0,0,0.9);;
                border: 1px solid #110d17;
            }
            .modal-content{
                border-radius:10px;
            }

            .btn{
                font-weight: bold;
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                width: 30%;
                padding: 15px;
                text-align: center;
                font-weight: bolder;
                color: #110d17;
                background:  #8b77b9;
                border: 2px solid #3f305c;
                border-radius: 10px;
            }

            .btn:hover{
                transition: 1s all ease-in-out;
                transform: scale(0.91,0.91);
                box-shadow: 0px 0px 10px #eeeaf4;
                background: #6d56a1;
                color: #110d17;
                border: 3px solid #110d17;
                border-radius: 10px;
            }
            .modal-footer{
                display: flex;
                align-items: center;
                justify-content: center;
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
                    
                    <input type="email" placeholder="Correo Electrónico" name="email" id="email" required>
                    <input type="password" placeholder="Contraseña" name="password" id="password" required><br>
                    <button type="submit">Iniciar</button>
                    <p class="message">¿No registrado? <a href="{{ route('register') }}">Crea una cuenta</a></p>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!--scrip para que se dispare el modal si el usuario es incorrecto-->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (document.getElementById('exampleModal')) {
                    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    myModal.show();
                }
            });
        </script>
        <center>
            @if ($errors->any())
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title fs-5" id="exampleModalLabel" style="text-align: center;width:100%">Error de autenticacion</h2>
                            </div>
                            <div class="modal-body">
                                        
                                
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                
                                <img src="{{asset('img/caterror.png')}}" alt="" style="width: 200px;height:200px ;">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </center>

    </body>

</html>
