@extends('base')
@include('includes/navbar')

<head>

    <link rel="stylesheet" href="{{ asset('css/destinos.css') }}">
</head>


@section('content')
    <div class="container">
        <h1 class="titulo">Próximos Vuelos</h1>
        <div class="datos">
            <table class="tabla-vuelo">
                <tr class="encabezado">
                    <th>Vuelo</th>
                    <th>Origen</th>
                    <th>fecha de Salida</th>
                    <th>Destino</th>
                    <th>fecha de llegada</th>
                    <th>Distancia</th>
                    <th>Aeronave</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                @foreach($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo['idVuelo'] }}</td>
                    <td>{{ $vuelo['destino']['ciudadOrigen']['nombre'] }}</td>
                    <td>{{ implode('-', $vuelo['fechaSalida']) }}</td>
                    <td>{{ $vuelo['destino']['ciudadDestino']['nombre'] }}</td>
                    <td>{{ implode('-', $vuelo['fechaLlegada']) }}</td>
                    <td>{{ $vuelo['destino']['distancia'] }}</td>
                    <td>{{ $vuelo['avion']['nombre'] }} - {{ $vuelo['avion']['modelo'] }}</td>
                    <td>{{ $vuelo['estado'] }}</td>
                    <td>
                        <a class="comprar" href="{{ route('vistaComprar', ['idVuelo' => $vuelo['idVuelo']]) }}">Comprar</a>
                    </td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
@endsection
