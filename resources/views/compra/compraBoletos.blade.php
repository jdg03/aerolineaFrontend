@extends('base')
@include('includes/navbar')

<head>

  <link rel="stylesheet" href="{{ asset('css/compraBoletos.css') }}">
</head>

@section('content')

<div class="container contenedor">

  <div class="row">

    <div class="lado-izquierdo col-md-5">

      <div class="ventanas">


       
      </div>
     

      <div class="contenedor-asientos">
        <div class="row">

          <div class="asientos-izquierdos col-md-5">

            <div class="row">

              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              


            </div>

          </div>

          <div class="pasillo col-md-2">

          </div>

          <div class="sasientos-derechos col-md-5">

            <div class="row">

              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>
              <div class="col-md-2 asientos">
                1
              </div>

              <div class="col-md-2 asientos">
                2
              </div>

              <div class="col-md-2 asientos">
                3
              </div>

            </div>

          </div>

        </div>

      </div>

        
   
    </div>

    <div class="col-md-1">

    </div>


    <div class="lado-derecho col-md-6">

      <h3> información del asiento</h3>

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