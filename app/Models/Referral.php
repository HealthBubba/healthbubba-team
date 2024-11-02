<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'users';
    protected $connection = 'main';

    function scopeIsFromTeam(Builder $query){
        $query->whereIn('referral_code', User::select('code'));
    }

    function user(){
        return $this->belongsTo(User::class, 'referral_code', 'code');
    }
}
