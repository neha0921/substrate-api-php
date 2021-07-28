<?php

namespace Neha0921\SubstrateApiPhp\Http\Controllers;

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
