<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'users';
    protected $connection = 'main';

    function user(){
        return $this->belongsTo(User::class, 'referral_code', 'code');
    }
}
