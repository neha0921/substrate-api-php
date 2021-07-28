<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Neha0921\SubstrateApiPhp\Http\Controllers'],function(){


   /*  Route::get('SubstrateApi',"SubstrateApiController")->name('SubstrateApi');
    Route::get('rpc',"RpcController")->name('rpc');
    Route::get('substrate-api',"SystemController")->name('system'); */

    Route::get('rpcCall',"RpcController@index")->name('dashboard');

    Route::post('rpcCall', [ 'as' => 'rpcCall', 'uses' => 'RpcController@RpcCallData']);

});


?>