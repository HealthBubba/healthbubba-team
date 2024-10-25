<?php

namespace App\Concerns;

use App\Enums\Status;

trait HasStatus {

    function initializeHasStatus() {
        $this->fillable[] = 'status';
        $this->mergeCasts([
            'status' => Status::class
        ]);

        $this->setAttribute('status', Status::ACTIVE);
    }

    function scopeIsActive($query){
        $query->whereStatus(Status::ACTIVE);
    }

}