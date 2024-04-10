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
        <div class="collapse navbar-collapse text-white d-flex justify-content-between align-items-center"
            id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3"
                        href="#">Vuelos</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3"
                        href="{{ route('destinos') }}">Destinos</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3"
                        href="">Precios</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary rounded-pill text-white border-0 me-3" href="/">Comprar
                        Ticket</a>
                </li>
            </ul>
            <ul>
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Iniciar Sesion</a>
                <a href="" class="btn btn-primary">Crear Cuenta</a>
            </ul>
        </div>
    </div>
</nav>