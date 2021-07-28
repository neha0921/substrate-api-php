<?php

namespace Neha0921\SubstrateApiPhp\Http\Controllers;

use Neha0921\SubstrateApiPhp\Http\traits\System;

class SystemController extends RpcController
{

    use System;

    public function __construct()
    {
        $this->_name = "";
        $this->_chain = "";
        $this->_health = "";
    }
}
