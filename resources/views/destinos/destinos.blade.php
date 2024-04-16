@extends('base')
@include('includes/navbar')

<head>

    <link rel="stylesheet" href="{{ asset('css/destinos.css') }}">
</head>


@section('content')
    <div class="container mx-auto">
        <h1 style="color: aliceblue"> Proximos Destinos</h1>

        <div class="d-flex p-5 my-5 mx-auto justify-content-start flex-wrap">

            <div class="">

                <table class="tabla-vuelo">
                    <tr class="encabezado">

                      <th>Vuelo</th>
                      <th>Origen</th>
                      <th>Hora de Salida</th>
                      <th>Destino</th>
                      <th>Hora de llegada</th>
                      <th>Aeronave</th>
                      <th>Estado</th>
                      <th></th>
                    </tr>
                    <tr>

                      <td>UA 6101</td>
                      <td class="origen">LGA, New York</td>
                      <td>25 Sep 2020 2:59 PM</td>
                      <td class="origen">IAD, Washington DC</td>
                      <td>25 Sep 2020 4:24 PM</td>
                      <td class="aeronave">Canadair Regional Jet700</td>
                      <td class="estado">Retrasado</td>
                      <td >
                        <a type="submit" class="comprar">Comprar</a>
                      </td>
                      
                        
                    </tr>

                    
                    <!-- Repiten las filas siguientes para cada vuelo en la tabla -->
                    
                </table>
                
            </div>

        </div>
            
        

    </div>
@endsection
