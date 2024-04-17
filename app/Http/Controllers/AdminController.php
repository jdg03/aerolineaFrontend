<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $client = new Client();

        try {
            $responseAviones = $client->request('GET', 'http://localhost:8080/api/aviones/obtener');
            $aviones = json_decode($responseAviones->getBody(), true);

            $responseAeropuertos = $client->request('GET', 'http://localhost:8080/api/aeropuertos');
            $aeropuertos = json_decode($responseAeropuertos->getBody(), true);

            // $responseDestinos = $client->request('GET', 'http://localhost:8080/api/destinos');
            // $destinos = json_decode($responseDestinos->getBody(), true);

            $responseClientes = $client->request('GET', 'http://localhost:8080/api/clientes/obtener');
            $clientes = json_decode($responseClientes->getBody(), true);

            return view('admin', [
                'aviones' => $aviones,
                'aeropuertos' => $aeropuertos,
                'clientes' => $clientes
            ]);
        } catch (\Exception $ex) {
            return "Ha ocurrido un error con el servidor al obtener los datos";
        }
    }
    public function agregarAeronave(Request $request)
    {
        $fabricante = $request->input('fabricante');
        $modelo = $request->input('modelo');
        $capacidad = $request->input('capacidad');
        $nombre = $request->input('nombre');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/aviones/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'modelo' => $modelo,
                    'capacidad' => $capacidad,
                    'fabricante' => $fabricante
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('admin');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function actualizarAeronave(Request $request, $id)
    {
        $fabricante = $request->input('fabricante');
        $modelo = $request->input('modelo');
        $capacidad = $request->input('capacidad');
        $nombre = $request->input('nombre');
        $client = new Client();
        try {
            $response = $client->put('http://localhost:8080/api/aviones/actualizar/' . $id, [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'modelo' => $modelo,
                    'capacidad' => $capacidad,
                    'fabricante' => $fabricante
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('admin');
            }
        } catch (\Exception $ex) {
            return "Error al actualizar: " . $ex;
        }
    }
    public function verEliminarAeronave($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/aviones/buscar/' . $id);
            $avion =  json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return view('aviones/eliminar', ['avion' => $avion]);
            }
        } catch (\Exception $ex) {
            return "Error al eliminar avion " . $ex;
        }
    }
    public function eliminarAeronave($id)
    {
        $client = new Client();
        try {
            $response = $client->delete('http://localhost:8080/api/aviones/eliminar/' . $id);

            if ($response->getStatusCode() == 200) {
                return redirect('admin');
            }
        } catch (\Exception $ex) {
            return "Error al eliminar avion " . $ex;
        }
    }
    public function editarAeronave($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/aviones/buscar/' . $id);
            $avion =  json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return view('aviones/editar', ['avion' => $avion]);
            }
        } catch (\Exception $ex) {
            return "Error al eliminar avion " . $ex;
        }
    }
    public function agregarPais(Request $request)
    {
        $client = new Client();
    }
}
