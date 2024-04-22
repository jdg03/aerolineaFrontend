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

            $responseDestinos = $client->request('GET', 'http://localhost:8080/api/destinos/obtener');
            $destinos = json_decode($responseDestinos->getBody(), true);

            $responseClientes = $client->request('GET', 'http://localhost:8080/api/clientes/obtener');
            $clientes = json_decode($responseClientes->getBody(), true);

            $responsePaises = $client->request('GET', 'http://localhost:8080/api/paises/obtener');
            $paises = json_decode($responsePaises->getBody(), true);

            $responseCiudades = $client->request('GET', 'http://localhost:8080/api/ciudades');
            $ciudades = json_decode($responseCiudades->getBody(), true);

            return view('admin', [
                'aviones' => $aviones,
                'aeropuertos' => $aeropuertos,
                'clientes' => $clientes,
                'paises' => $paises,
                'ciudades' => $ciudades,
                //'destinos' => $destinos
            ]);
        } catch (\Exception $ex) {
            return $ex;
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
        $nombre = $request->input('nombre');
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/paises/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('admin');
            }
        } catch (\Exception $ex) {
            return "Error al crear pais: " . $ex;
        }
    }
    public function editarPais($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/paises/buscar/' . $id);
            $pais =  json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return view('paises/editar', ['pais' => $pais]);
            }
        } catch (\Exception $ex) {
            return "Error al obtener el pais " . $ex;
        }
    }
    public function actualizarPais(Request $request, $id)
    {
        $nombre = $request->input('nombre');
        $client = new Client();
        try {
            $response = $client->put('http://localhost:8080/api/paises/actualizar/' . $id, [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('admin');
            }
        } catch (\Exception $ex) {
            return "Ocurrion un error al actualizar pais: " . $ex;
        }
    }
    public function verEliminarPais($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/paises/buscar/' . $id);
            $pais = json_decode($response->getBody(), true);
            if ($response->getStatusCode() == 200) {
                return view("paises/eliminar", ['pais' => $pais]);
            }
        } catch (\Exception $ex) {
            return "Error al obtener el pais: " . $ex;
        }
    }
    public function eliminarPais($id)
    {
        $client = new Client();
        try {
            $response = $client->delete('http://localhost:8080/api/paises/eliminar/' . $id);
            if ($response->getStatusCode() == 200) {
                return redirect('admin');
            }
        } catch (\Exception $ex) {
            return "Error al eliminar aeronave: " . $ex->getCode();
        }
    }

    public function agregarCiudad(Request $request)
    {
        $nombreCiudad = $request->input('nombreCiudad');
        $pais = $request->input('pais');
        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/ciudades/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombreCiudad,
                    'pais' => [
                        'idPais' => $pais
                    ]
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('admin');
            }
        } catch (\Exception $ex) {
            return "Ocurrio un error al crear la ciudad: " . $ex->getCode();
        }
    }
    public function editarCiudad($id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/ciudades/buscar/' . $id);
            $ciudad = json_decode($response->getBody(), true);
            if ($response->getStatusCode() == 200) {
                return view('ciudades/editar', ['ciudad' => $ciudad]);
            }
        } catch (\Exception $ex) {
            return "Error al obtener ciudad a editar: " . $ex;
        }
    }
    public function actualizarCiudad(Request $request, $id)
    {
        $client = new Client();
        $nombre = $request->input('nombre');
        try {
            $response = $client->put('http://localhost:8080/api/ciudades/actualizar/' . $id, [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect('admin');
            }
        } catch (\Exception $ex) {
            return "Error al actualizar ciudad: " . $ex;
        }
    }
    public function agregarAeropuerto(Request $request)
    {
        $nombre = $request->input('nombre');
        $ciudad = $request->input('ciudad');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/aeropuertos/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'ciudad' => [
                        'idCiudad' => $ciudad
                    ]
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect('admin');
            }
        } catch (\Exception $ex) {
            return "Error al crear aeropuerto: " . $ex;
        }
    }
}
