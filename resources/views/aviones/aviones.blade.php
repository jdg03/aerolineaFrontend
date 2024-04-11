@extends('base')
@include('includes/navbar')
@section('content')
    <div class="container">
        @if ($aviones)
            <h2 class="my-5">Aeronaves registradas:</h2>
            <table class="table mt-5 table-striped">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Marca</th>
                        <th scope="col">Asientos Primera Clase</th>
                        <th scope="col">Asientos Premium</th>
                        <th scope="col">Asientos Basicos</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aviones as $avion)
                        <tr>
                            <th>{{ $avion['marca'] }}</th>
                            <td>{{ $avion['asientosPrimeraClase'] }}</td>
                            <td>{{ $avion['asientosPremium'] }}</td>
                            <td>{{ $avion['asientosBasico'] }}</td>
                            <td>
                                <a href="" class="btn btn-primary rounded-pill">Ver Detalles</a>
                                <a href="" class="btn btn-danger rounded-pill">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="" class="btn btn-primary rounded-pill border-0" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Nueva Aeronave</a>
        @else
            <h2>No hay registadads</h2>
        @endif
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Aeronave</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('guardarAeronave')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="marca" placeholder="Marca de la aeronave"
                                class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="asientosPrimeraClase" placeholder="Asientos Primera Clase"
                                class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="asientosPremium" placeholder="Asientos Premium" class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="asientosBasicos" placeholder="Asientos Basicos" class="form-control mx-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Aeronave" class="btn btn-primary rounded-pill">
                        </div>  
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
