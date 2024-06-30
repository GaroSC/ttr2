<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous"
    />
    <style>
        .showcase {
            background-image: linear-gradient(to right, #85ceff, #2b7de9);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            letter-spacing: 4px;
        }

        .showcase-bottom::after {
            content: '';
            position: absolute;
            height: 200px;
            bottom: -70px;
            right: 0;
            left: 0;
            background: #ffffff;
            transform: skewY(6deg);
            -webkit-transform: skewY(5deg);
            -moz-transform: skewY(5deg);
            -ms-transform: skewY(5deg);
        }

        .btn-primary,
        .bg-primary {
            background-color: #a08bff;
            border: 0;
        }

        @media (max-width: 768px) {
            .showcase {
                height: 100%;
                padding: 100px 0;
            }
            .showcase-bottom::after {
                height: 450px;
                display: block;
                margin: 0 auto;
                padding-top: 20px;
            }
        }
    </style>
    <title>TTR-APP | Welcome</title>
</head>
<body class="bg-white">
    <!-- Showcase -->
    <section class="showcase">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 text-light">
                        <img src="{{ asset('img/bannerttr.png') }}" alt="TTR-APP" class="img-fluid" style="width: 300px;">
                        <h1 class="display-1 fw-lighter py-4">¡Bienvenido a<br> <span class="fw-medium">TTR-APP</span>!</h1>
                        <h3 class="lead">Una sencilla aplicación web para gestionar tus citas diarias de tutoría.</h3>
                        <h4 class="lead">Por favor inicia sesión o registrate para comenzar a usar la aplicación.</h4>
                        <br>
                        <row>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/home') }}" class="btn btn-primary rounded-pill text-uppercase px-5 py-2">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill text-uppercase px-5 py-2">Iniciar Sesión</a>
                                    &nbsp;
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill text-uppercase px-5 py-2">Registrar</a>
                                    @endif
                                @endauth    
                            @endif
                        </row>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('img/main1.jpg') }}" alt="" class="img-fluid rounded mx-auto">
                </div>
            </div>
        </div>
    </section>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
</body>
</html>