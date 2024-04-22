<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


class compraController extends Controller
{

    //muestra la vista con los asientos respectivos del avion
    public function comprarVuelo(Request $request, $idVuelo){

        $client = new Client();

        try {
        
            $url = "http://localhost:8080/api/vuelos/buscar/$idVuelo";
            $response = $client->request('GET', $url);
 
     
            $Vuelo = json_decode($response->getBody()->getContents(), true);

            $asientos_primera_clase = [];
            $asientos_premium = [];
            $asientos_basico = [];

            foreach ($Vuelo['avion']['asiento'] as $asiento) {
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
                    return view('compra/compraBoletos', compact('asientos_primera_clase', 'asientos_premium', 'asientos_basico'));

         } catch (\Exception $ex) {
         
         return $ex;
         }
    
    }
    
    public function realizarCompra(Request $request, $idAsiento, $idVuelo) {

        $asientoClient = new Client();
        $client = new Client();
        $boletoClient = new Client();
        $ventaClient = new Client();

        // actualizacion del asiento
        try {
            // Hacer la solicitud put  actualizar el asiento
            $asientoResponse = $asientoClient->put('http://localhost:8080/api/asientos/actualizar/' . $idAsiento, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'estado' => false 
                ]
            ]);
    
        } catch (\Exception $ex) {
           
            return "Error al actualizar el cliente: " . $ex->getMessage();
        }
    
        // Crear al cliente
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $direccion = $request->input('direccion');
        $nacionalidad = $request->input('nacionalidad');
        $pasaporte = $request->input('pasaporte');
        
        try {
            $clienteResponse = $client->request('POST', 'http://localhost:8080/api/clientes/crear', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'correo' => $correo,
                    'nacionalidad' => $nacionalidad,
                    'pasaporte' => $pasaporte,
                    'direccion' => $direccion,
                    'clienteRegistrado' => false// por defecto
                ],
            ]);
        } catch (\Exception $ex) {
           
            return "Error al crear el cliente: " . $ex->getMessage();
        }
         //convierte al cliente a Json para acceder a sus propiedades y poder asignarlas a la venta
         $clienteResponse = json_decode( $clienteResponse->getBody()->getContents());
   
          

        // convierte el asiento actualizado a Json para acceder a sus propiedades y poder asignarlas al boleto
        $asientoResponse = json_decode($asientoResponse->getBody()->getContents());
        
        // Crear el boleto
        try {
            $boletoResponse =  $boletoClient->request('POST', 'http://localhost:8080/api/boletos/crear', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    "idVuelo" => $idVuelo, // viene como parametro
                    "idAsiento" => $asientoResponse->idAsiento,
                    "precioTotal" => $asientoResponse->clase->precio
                ]
            ]);
        } catch (\Exception $ex) {
           
            return "Error al crear el boleto: " . $ex->getMessage();
        }
        //convierte al boleto a Json para acceder a sus propiedades y poder asignarlas al detalle de venta
        $boletoResponse = json_decode($boletoResponse->getBody()->getContents());
          
        // Crear la venta
        try {
            
            $ventaResponse = $ventaClient->request('POST', 'http://localhost:8080/api/ventas/crear/' . $clienteResponse->idCliente . '/' . $boletoResponse->precioTotal, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);            
            
        } catch (\Exception $ex) {
            // Manejar errores en la creación de la venta
           return "Error al crear la venta: " . $ex->getMessage();
        }

        //convierte la venta a Json para acceder a sus propiedades y poder asignarlas a detalle de venta
        $ventaResponse = json_decode($ventaResponse->getBody()->getContents());

        // Crea el detalle de venta
    
        // Recargar la página
        return back();
    }
    


    


    
}
