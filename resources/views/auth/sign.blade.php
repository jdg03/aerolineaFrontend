@extends('base')
@include('includes/header')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow" style="width: 30rem;">
            <img src="{{ asset('images/logo.png') }}" class="mx-auto" width="140px" alt="">
            <h3 class="text-center text-secondary my-3">Crear Cuenta</h3>
            <form action="{{route('crearCliente')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="correo" placeholder="CorreoElectronico" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="telefono" placeholder="Telefono" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="direccion" placeholder="Direccion" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nacionalidad" placeholder="Nacionalidad" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="pasaporte" placeholder="Pasaporte" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="contrasenia" placeholder="Contrasenia" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="submit" value="Crear Cuenta" class="btn btn-primary rounded-pill w-100 mx-3">
                </div>
                <div class="input-group mb-3">
                    <a href="{{ route('login') }}" class="text-center mx-auto">Iniciar Sesion</a>
                </div>
            </form>
        </div>
    </div>
@endsection
