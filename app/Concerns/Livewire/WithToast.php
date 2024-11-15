<?php

namespace App\Concerns\Livewire;

use App\Library\Toast;

trait WithToast {

    function toast($message, $title = null){
        $toast = new Toast($message, $title);
        $toast->livewire = $this;
        return $toast;
    }

}
