@extends('base')
@include('includes/navbar')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow" style="width: 30rem">
            <div class="card-header bg-primary">
                <h3 class="text-white">Editar "{{ $avion['modelo'] }}"</h3>
            </div>
            <div class="card-body">
                <form action="{{route('actualizarAeronave',['id'=>$avion['idAvion']])}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="fabricante" value="{{$avion['fabricante']}}" placeholder="Fabricante" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="modelo" value="{{$avion['modelo']}}" placeholder="Modelo" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="capacidad" placeholder="Capacidad" value="{{$avion['capacidad']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="nombre" placeholder="Nombre" value="{{$avion['nombre']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" value="Actualizar" class="btn btn-primary rounded-pill w-100 m-3">
                        <a href="{{ route('admin') }}" class="btn btn-outline-primary rounded-pill w-100 mx-3">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
