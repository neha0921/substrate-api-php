<?php

namespace Neha0921\SubstrateApiPhp\Http\traits;

use Neha0921\SubstrateApiPhp\Http\Models\SubstrateBase;

trait System
{
    /* system_name endpoint API*/
    
    public function name()
    {
        $response = SubstrateBase::APIHandler('system_'.__FUNCTION__);
        $this->_name = $response['result'];
        return response()->json($this->_name);
    }

     /* system_name endpoint API*/
    
     public function chain()
     {
         $response = SubstrateBase::APIHandler('system_'.__FUNCTION__);
         $this->_chain = $response['result'];
         return response()->json($this->_chain);
     }

      /* system_name endpoint API*/
    
    public function health()
    {
        $response = SubstrateBase::APIHandler('system_'.__FUNCTION__);
        $this->_health = $response['result'];
        return response()->json($this->_health);
    }

}
