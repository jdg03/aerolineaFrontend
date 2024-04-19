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
 
         //return $asientos;
        return view('compra/compraBoletos', compact('asientos'));
 
         } catch (\Exception $ex) {
         
         return "Ha ocurrido un error con el servidor al obtener los datos";
         }
    
    }
}
