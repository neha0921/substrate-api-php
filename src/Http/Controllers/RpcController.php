<?php

namespace Neha0921\SubstrateApiPhp\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Neha0921\SubstrateApiPhp\Http\Models\SubstrateBase;
use Neha0921\SubstrateApiPhp\Http\traits\System;

class RpcController extends Controller
{

    use System;

    public function index()
    {
        return view('substrate-api-php::rpcCall');
    }

    public function RpcCallData(Request $request)
    {
            $methodName = isset($request['method_name']) ? $request['method_name'] : 'rpc_methods';
            $params = isset($request['params']) ? $request['params'] : [];
            $id = isset($request['id']) ? $request['id'] : 1;
         
        $response = SubstrateBase::APIHandler($methodName, $params, $id);
        return response()->json($response);
    }
}
