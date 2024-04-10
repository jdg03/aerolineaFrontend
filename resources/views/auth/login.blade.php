@extends('base')
@include('includes/header')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow" style="width: 30rem">
            <img src="{{ asset('images/logo.png') }}" class="mx-auto" width="150px" alt="">
            <h3 class="text-center text-secondary my-3">Inicio de Sesion</h3>
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" name="usuario" placeholder="Usuario" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="" placeholder="Contrasenia" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="submit" value="Iniciar Sesion" class="btn btn-primary rounded-pill w-100 mx-3">
                </div>
                <div class="input-group mb-3">
                    <a href="" class="text-center mx-auto">No tengo una cuenta</a>
                </div>
            </form>
        </div>
    </div>
@endsection
