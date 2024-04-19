<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    public function index(){

        $client = new Client();

        try {
        
         $response = $client->request('GET', 'http://localhost:8080/api/vuelos');
 
     
         $vuelos = json_decode($response->getBody()->getContents(), true);
 
         //return $vuelos;
         return view('destinos/destinos', compact('vuelos'));
 
         } catch (\Exception $ex) {
         
         return "Ha ocurrido un error con el servidor al obtener los datos";
         }
   
  
    }
    
}

  
