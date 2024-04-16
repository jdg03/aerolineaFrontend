@extends('base')
@include('includes/navbar')

<head>
    
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

@section('content')
    
    <div class="container contenedor">

        <div class="contenedor1">


            <div class="info">
                <h3 class="display-1">Mayan Airlines</h3>
          
                <p class="mt-5 fs-2 fw-lighter text-center">
                    Nuestra misión es conectar a las personas con sus sueños de viaje. Creemos que volar debe ser una experiencia placentera y accesible para todos.
                </p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('compraBoletos') }}" class="btn btn-outline-light btn-lg">Comprar boleto</a>
        </div>
        
        
    </div>









    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{asset('images/avion.png')}}" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
