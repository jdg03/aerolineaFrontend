@extends('base')
@include('includes/navbar')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow" style="width: 30rem">
            <div class="card-header bg-secondary">
                <h3 class="text-white">Editar pais</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf

                </form>
            </div>
        </div>
    </div>
@endsection
