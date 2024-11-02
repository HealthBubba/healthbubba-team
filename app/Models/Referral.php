<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'users';
    protected $connection = 'main';

    function scopeIsFromTeam(Builder $query){
        $query->whereBelongsTo($this->user);
    }

    function user(){
        return $this->belongsTo(User::class, 'referral_code', 'code');
    }
}
