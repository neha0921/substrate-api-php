<?php

namespace Neha0921\SubstrateApiPhp;

use Illuminate\Support\ServiceProvider;

class PolkaServiceProvider extends ServiceProvider {

    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'substrate-api-php');
        // $this->loadRoutesFrom(__DIR__.'/views','substrate-api-php');
    }

    public function register()
    {
        
    }
    
}


?>