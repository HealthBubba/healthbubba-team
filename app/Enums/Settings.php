<?php

namespace App\Enums;

use App\Models\Setting;

enum Settings:string {

    case COMMISSION_FEE = 'comission_fee';

    function default(){
        return match($this) {
            self::COMMISSION_FEE => 1000
        };
    }

    function name(){
        return match($this) {
            self::COMMISSION_FEE => 'Commission Fee'
        }; 
    }

    function types(){
        return match($this) {
            self::COMMISSION_FEE => 'number'
        }; 
    }

    function find(){
        return Setting::whereCode($this)->first();
    }

    function update($value){
        $this->find()->update(['value' => $value]);
    } 

    function create(){
        if($this->find()) return;
        Setting::create([
            'code' => $this,
            'value' => $this->default(),
            'name' => $this->name()
        ]);
    } 

    function value(){
        return $this->find()?->value;
    }

}