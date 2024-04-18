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
                    <th>Hora de Salida</th>
                    <th>Destino</th>
                    <th>Hora de llegada</th>
                    <th>Aeronave</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                @foreach($vuelos as $vuelo)
                    <tr>
                        <td>{{ $vuelo['idVuelo'] }}</td>
                        <td>{{ $vuelo['destino']['ciudadOrigen']['nombre'] }}, {{ $vuelo['destino']['ciudadOrigen']['pais']['nombre'] }}</td>
                        <td>{{ $vuelo['fechaSalida'] }}</td>
                        <td>{{ $vuelo['destino']['ciudadDestino']['nombre'] }}, {{ $vuelo['destino']['ciudadDestino']['pais']['nombre'] }}</td>
                        <td>{{ $vuelo['fechaLlegada'] }}</td>
                        <td>{{ $vuelo['avion']['nombre'] }} - {{ $vuelo['avion']['modelo'] }}</td>
                        <td>{{ $vuelo['estado'] }}</td>
                        <td>
                            <a class="comprar" href="{{ route('compraBoletos', ['idVuelo' => $vuelo['idVuelo']]) }}">Comprar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
