<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\MPRequestOptions;
use MercadoPago\Net\MPRequest;

class PaymentController extends Controller
{
    public function createPreference(Request $request) {

         // 1. Configurar las credenciales de Mercado Pago
        //  MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
         MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
         $client = new PreferenceClient();
        //  $request_options = new MPRequest();
 
         $preference = $client->create([
             "items" => array(
                 array(
                     "title" => "My product",
                     "quantity" => 1,
                     "unit_price" => 2000
                 )
             ),
             false
         ]);
        
        
        //  $preference->save();
 
         // 8. Devolver la preferencia al frontend
         return response()->json([
             'id' => $preference->id,
            //  'init_point' => $preference->init_point, // URL del Checkout Pro
         ]);
    }
}
