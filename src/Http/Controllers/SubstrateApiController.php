<?php

namespace Neha0921\SubstrateApiPhp\Http\Controllers;

use Illuminate\Http\Request;
use Neha0921\SubstrateApiPhp\Http\Models\SubstrateBase;
use Neha0921\SubstrateApiPhp\Http\traits\System;

class SubstrateApiController extends BaseController
{

    public function __construct()
    {
        $this->_rpc = '';
    }

    public function rpc()
    {
        $this->_rpc = new RpcController();
        return $this->_rpc;
    }

}
