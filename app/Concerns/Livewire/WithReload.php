<?php

namespace App\Concerns\Livewire;

trait WithReload {

    function reload(){
        return $this->js("window.location.reload()");
    }

}