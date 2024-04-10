@extends('base')
@include('includes/navbar')
@section('content')
    <div class="container">
        <div class="card mt-5 shadow my-auto">
            <div class="card-header bg-primary text-white">
                Proximo vuelo
            </div>
            <div class="card-body">
                
                <a href="" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprar Vuelo</a>
            </div>
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
