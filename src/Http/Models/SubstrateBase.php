<?php

namespace Neha0921\SubstrateApiPhp\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SubstrateBase extends Model{

    const API_URL = "http://127.0.0.1:8000";
    const HTTP_METHOD = "POST";

    /* Function which call any API through CRUL
    Input parameter :: URL, HTTP method (GET, POST..) and Body payload.
    Output :: API response
    */
    public static function APIHandler($MethodName, $param = [], $id = 1)
    {
         /* Set input payload */
         $inputData = [
            "jsonrpc" => "2.0",
            "method" => $MethodName,
            "params" => $param,
            "id" => $id
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => SubstrateBase::API_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => SubstrateBase::HTTP_METHOD,
            CURLOPT_POSTFIELDS => json_encode($inputData),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

}

?>