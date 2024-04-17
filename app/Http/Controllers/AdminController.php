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
            $responseAviones = $client->request('GET', 'http://localhost:8080/api/aviones');
            $aviones = json_decode($responseAviones->getBody(), true);

            $responseAeropuertos = $client->request('GET', 'http://localhost:8080/api/aeropuertos');
            $aeropuertos = json_decode($responseAeropuertos->getBody(), true);

            $responseDestinos = $client->request('GET', 'http://localhost:8080/api/destinos');
            $destinos = json_decode($responseDestinos->getBody(), true);

            $responseClientes = $client->request('GET', 'http://localhost:8080/api/clientes');
            $clientes = json_decode($responseClientes->getBody(), true);

            return view('admin', [
                'aviones' => $aviones,
                'aeropuertos' => $aeropuertos,
                'destinos' => $destinos,
                'clientes' => $clientes
            ]);
        } catch (\Exception $ex) {
            return "Ha ocurrido un error con el servidor al obtener los datos";
        }
    }
    public function agregarAeronave(Request $request)
    {
        $marca = $request->input('marca');
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
                    'marca' => $marca
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('admin');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function eliminarAeronave($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/aviones/eliminar?id=', $id);
        } catch (\Exception $ex) {
            return "Error al eliminar avion " . $ex;
        }
    }
}
