<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class compraController extends Controller
{
    public function index(Request $request, $idAvion){

        $client = new Client();

        try {
        
            $url = "http://localhost:8080/api/aviones/obtenerAsientos/$idAvion";
            $response = $client->request('GET', $url);
 
     
            $asientos = json_decode($response->getBody()->getContents(), true);

            $asientos_primera_clase = [];
            $asientos_premium = [];
            $asientos_basico = [];

            foreach ($asientos as $asiento) {
                switch ($asiento['clase']['nombre']) {
                    case 'Primera Clase':
                        $asientos_primera_clase[] = $asiento;
                        break;
                    case 'Premium':
                        $asientos_premium[] = $asiento;
                        break;
                    case 'Básico':
                        $asientos_basico[] = $asiento;
                        break;
                    default:
                        // Manejo de caso no esperado
                        break;
                }
            }   
 
                    //return $asientos;
                    return view('compra/compraBoletos', compact('asientos', 'asientos_primera_clase', 'asientos_premium', 'asientos_basico'));

         } catch (\Exception $ex) {
         
         return "Ha ocurrido un error con el servidor al obtener los datos";
         }
    
    }
}
