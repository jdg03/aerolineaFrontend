<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AvionController extends Controller
{
    public function index()
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/aviones');
            $aviones = json_decode($response->getBody(), true);
            return view('aviones/aviones', ['aviones' => $aviones]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function agregarAeronave(Request $request)
    {
        $marca = $request->input('marca');
        $asientosPrimeraClase = $request->input('asientosPrimeraClase');
        $asientosPremium = $request->input('asientosPremium');
        $asientosBasicos = $request->input('asientosBasicos');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/aviones/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'marca' => $marca,
                    'asientosPrimeraClase' => $asientosPrimeraClase,
                    'asientosPremium' => $asientosPremium,
                    'asientosBasico' => $asientosBasicos
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('aviones');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
