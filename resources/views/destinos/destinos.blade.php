@extends('base')
@include('includes/navbar')

<head>

    <link rel="stylesheet" href="{{ asset('css/destinos.css') }}">
</head>


@section('content')
    <div class="container">
        <h1 class="titulo">Próximos Destinos</h1>
        <div class="datos">
            <table class="tabla-vuelo">
                <tr class="encabezado">
                    <th>Vuelo</th>
                    <th>Origen</th>
                    <th>fecha de Salida</th>
                    <th>Destino</th>
                    <th>fecha de llegada</th>
                    <th>Aeronave</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                @foreach($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo['idVuelo'] }}</td>
                    <td>{{ $vuelo['destino']['ciudadOrigen']['nombre'] }}, {{ $vuelo['destino']['ciudadOrigen']['idCiudad'] }}</td>
                    <td>{{ $vuelo['fechaSalida'][2] }}-{{ $vuelo['fechaSalida'][1] }}-{{ $vuelo['fechaSalida'][0] }}</td>
                    <td>{{ $vuelo['destino']['ciudadDestino']['nombre'] }}, {{ $vuelo['destino']['ciudadDestino']['idCiudad'] }}</td>
                    <td>{{ $vuelo['fechaLlegada'][2] }}-{{ $vuelo['fechaLlegada'][1] }}-{{ $vuelo['fechaLlegada'][0] }}</td>
                    <td>{{ $vuelo['avion']['nombre'] }} - {{ $vuelo['avion']['modelo'] }} - id: {{ $vuelo['avion']['idAvion'] }}</td>
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
