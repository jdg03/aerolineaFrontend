<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function sign()
    {
        return view('auth/sign');
    }
    
    public function crearCliente(Request $request)
    {
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $direccion = $request->input('direccion');
        $nacionalidad = $request->input('nacionalidad');
        $pasaporte = $request->input('pasaporte');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/clientes/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'correo' => $correo,
                    'nacionalidad' => $nacionalidad,
                    'pasaporte' => $pasaporte,
                    'direccion' => $direccion,
                    'clienteRegistrado' => true
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
