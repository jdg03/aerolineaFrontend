<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-primary bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo.png') }}" class="me-2" alt="" width="70px">
                <h3 class="text-white">Mayan Airlines</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-white d-flex justify-content-between align-items-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3" href="#">Vuelos</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3"
                            href="{{ route('destinos') }}">Destinos</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3" href="">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3" href="/">Comprar Ticket</a>
                    </li>
                </ul>
                <ul>
                    <a href="" class="btn btn-outline-light me-2">Iniciar Sesion</a>
                    <a href="" class="btn btn-primary">Crear Cuenta</a>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
