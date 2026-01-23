<?php

use App\Library\Toast;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if(!function_exists('status')) {
    function status($status, $message = '', $data = []){
        $state = [$status, $message, $data];
        return [...$state, $state];
    }
}

if(!function_exists('authenticated')){
    function authenticated($relations = [], $guard = 'web') : User | Referral | null {
        if($user = User::whereEmail(Auth::guard($guard)->user()?->email)->first()) { 
            return $user;
        }

        return Referral::find(Auth::guard('marketer')->id());
    }
}


if(!function_exists('toast')) {
    function toast($message, $title = null){
        return new Toast($message, $title);
    }
}

if(!function_exists('jsonify')) {
    function jsonify(array $arr = []) : object {
        return json_decode(json_encode($arr));
    }
}




