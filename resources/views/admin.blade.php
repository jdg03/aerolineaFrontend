@extends('base')
@include('includes/navbar')
@section('content')
    <div class="container">
        <h1 class="display-4 text-white mb-5">Administracion del Sistema</h1>
        <div class="card p-5">
            {{-- vuelos --}}
            <div class="card shadow mb-5">
                <div class="card-header" style="background-color: rgb(98, 153, 255)">
                    <h3 class="text-white">Vuelos</h3>
                </div>
                <div class="card-body">
                    @if ($destinos)
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Numero Vuelo</th>
                                    <th scope="col">Avion</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Salida</th>
                                    <th scope="col">Llegada</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-secondary my-3">No hay destinos creados.</h2>
                    @endif
                    <button type="button" class="btn text-white border-0 rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalDestinos" style="background-color: rgb(98, 153, 255)">
                        Nuevo Vuelo
                    </button>
                </div>
            </div>
            {{-- Aeronaves --}}
            <div class="card shadow mb-5">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Aeronaves</h3>
                </div>
                <div class="card-body">
                    @if ($aviones)
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fabricante</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Capacidad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aviones as $avion)
                                    <tr>
                                        <td>{{ $avion['nombre'] }}</td>
                                        <td>{{ $avion['fabricante'] }}</td>
                                        <td>{{ $avion['modelo'] }}</td>
                                        <td>{{ $avion['capacidad'] }}</td>
                                        <td>
                                            <a href="{{ route('editarAeronave', ['id' => $avion['idAvion']]) }}"
                                                class="btn rounded-pill btn-outline-primary">Editar</a>
                                            <a href="{{ route('verEliminarAeronave', ['id' => $avion['idAvion']]) }}"
                                                class="btn rounded-pill btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-secondary my-3">No hay aeronaves en registro.</h2>
                    @endif
                    <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalAeronaves">
                        Nueva Aeronave
                    </button>
                </div>
            </div>
            {{-- Aeropuertos --}}
            <div class="card shadow mb-5">
                <div class="card-header bg-danger">
                    <h3 class="text-white">Aeropuertos</h3>
                </div>
                <div class="card-body">
                    @if ($aeropuertos)
                        <table class="table table-striped">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aeropuertos as $aeropuerto)
                                    <tr>
                                        <td>{{$aeropuerto['nombre']}}</td>
                                        <td>{{$aeropuerto['ciudad']['nombre']}}</td>
                                        <td>
                                            <a href="" class="btn btn-outline-primary">Editar</a>
                                            <a href="" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-secondary my-3">No hay aeropuertos creados.</h2>
                    @endif
                    <button type="button" class="btn btn-danger rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalAeropuertos">
                        Nuevo Aeropuerto
                    </button>
                </div>
            </div>
            {{-- destinos --}}
            <div class="card shadow mb-5">
                <div class="card-header bg-success">
                    <h3 class="text-white">Destinos</h3>
                </div>
                <div class="card-body">
                    @if ($destinos)
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">CallSign</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Capacidad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-secondary my-3">No hay destinos creados.</h2>
                    @endif
                    <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalDestinos">
                        Nuevo Destino
                    </button>
                </div>
            </div>
            {{-- clientes --}}
            {{-- <div class="card shadow mb-5">
                <div class="card-header bg-warning">
                    <h3 class="text-white">Clientes</h3>
                </div>
                <div class="card-body">
                    @if ($clientes)
                        <table class="table table-striped">
                            <thead class="table-warning">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Nacionalidad</th>
                                    <th scope="col">Pasaporte</th>
                                    <th scope="col">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <td>{{ $cliente['nombre'] }}</td>
                                    <td>{{ $cliente['correo'] }}</td>
                                    <td>{{ $cliente['direccion'] }}</td>
                                    <td>{{ $cliente['nacionalidad'] }}</td>
                                    <td>{{ $cliente['pasaporte'] }}</td>
                                    <td>
                                        <a href="" class="btn rounded-pill btn-outline-primary">Ver Detalles</a>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="my-3 text-secondary">Aun no hay clientes registrados.</h2>
                    @endif
                </div>
            </div> --}}
            {{-- paises --}}
            <div class="card shadow mb-5">
                <div class="card-header bg-secondary">
                    <h3 class="text-white">Paises</h3>
                </div>
                <div class="card-body">
                    @if ($paises)
                        <table class="table table-striped">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Pais</th>
                                    <th scope="col">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paises as $pais)
                                    <tr>
                                        <td>{{ $pais['idPais'] }}</td>
                                        <td>{{ $pais['nombre'] }}</td>
                                        <td>
                                            <a href="{{ route('editarPais', ['id' => $pais['idPais']]) }}"
                                                class="btn rounded-pill btn-outline-primary">Editar</a>
                                            <a href="{{ route('verEliminarPais', ['id' => $pais['idPais']]) }}"
                                                class="btn rounded-pill btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-secondary my-3">No hay paises registrados.</h2>
                    @endif
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalPaises">
                        Nuevo Pais
                    </button>
                </div>
            </div>
            {{-- Ciudades --}}
            <div class="card shadow mb-5">
                <div class="card-header bg-secondary">
                    <h3 class="text-white">Ciudades</h3>
                </div>
                <div class="card-body">
                    @if ($ciudades)
                        <table class="table table-striped">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">#ID</th>

                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ciudades as $ciudad)
                                    <tr>

                                        <td>{{ $ciudad['idCiudad'] }}</td>
                                        {{-- <td>{{ $ciudad['pais']['nombre'] }}</td> --}}
                                        <td>{{ $ciudad['nombre'] }}</td>
                                        <td>
                                            <a href="{{ route('editarPais', ['id' => $pais['idPais']]) }}"
                                                class="btn rounded-pill btn-outline-primary">Editar</a>
                                            <a href="{{ route('verEliminarAeronave', ['id' => $avion['idAvion']]) }}"
                                                class="btn rounded-pill btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class="text-secondary my-3">No hay ciudades registradas.</h2>
                    @endif
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalCiudades">
                        Registrar Ciudad
                    </button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Aeronaves-->
    <div class="modal fade" id="modalAeronaves" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Agregar Aeronave</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('agregarAeronave') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="fabricante" placeholder="Fabricante" class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="modelo" placeholder="Modelo" class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="capacidad" placeholder="Capacidad" class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control mx-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary rounded-pill"
                                data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Aeronave" class="btn btn-primary rounded-pill">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal aeropuertos --}}
    <div class="modal fade" id="modalAeropuertos" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Agregar Aeropuerto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('agregarAeropuerto')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="nombre" placeholder="Nombre del aeropuerto"
                                class="form-control">
                        </div>
                        <div class="form-floating">
                            <select class="form-select" name="ciudad" id="floatingSelect" aria-label="Floating label select example">
                                @foreach ($paises as $pais)
                                   @foreach ($pais['ciudades'] as $ciudad)
                                       <option value="{{$ciudad['idCiudad']}}">{{$ciudad['nombre']}} - {{$pais['nombre']}}</option>
                                   @endforeach
                                @endforeach
                            </select>
                            <label for="floatingSelect">Seleccione la ciudad del aeropuerto</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Aeropuerto" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal destinos --}}
    <div class="modal fade" id="modalDestinos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Destino</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal clientes --}}
    <div class="modal fade" id="modalClientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal paises --}}
    <div class="modal fade" id="modalPaises" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Agregar Nuevo Pais</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('agregarPais') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="nombre" placeholder="Nombre de pais" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Pais" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal ciudades --}}
    <div class="modal fade" id="modalCiudades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Agregar Nueva Ciudad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('agregarCiudad') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <select class="form-select mb-3" name="pais" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Seleccionar Pais</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais['idPais'] }}">{{ $pais['nombre'] }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Selecciona el pais al que pertenece la nueva ciudad</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nombreCiudad" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Nombre de la Ciudad</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Ciudad" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
