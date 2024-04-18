@extends('base')
@include('includes/navbar')
@section('content')
    <div class="container p-0">
        <div class="card m-0">
            <div class="card-header bg-danger">
                <h3 class="text-white">Eliminar Aeronave</h3>
            </div>
            <div class="card-body text-center p-5">
                <p class="fs-3 text-secondary">Esta seguro que dese eliminar la aeronave "{{ $avion['modelo'] }}"?
                </p>
                <a href="{{ route('admin') }}" class="btn btn-outline-danger me-2">Volver</a>
                <a href="{{route('eliminarAeronave', ['id'=>$avion['idAvion']])}}" class="btn btn-danger">Si, eliminar</a>
            </div>
        </div>
    </div>
@endsection
