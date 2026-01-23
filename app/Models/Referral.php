<?php

namespace App\Models;

use App\Enums\Role;
use App\Enums\Settings;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;

class Referral extends Authenticatable {
    use Impersonate;
    
    protected $table = 'users';
    protected $connection = 'main';

    protected $append = ['role', 'is_marketer', 'marketer'];

    function scopeIsFromTeam(Builder $query){
        $query->whereIn('referral_code', User::select('code'));
    }

    function user(){
        return $this->belongsTo(User::class, 'referral_code', 'referral_code');
    }

    function getMarketerAttribute(){
        return Marketer::whereUserId($this->id)->first();
    }

    function patientReferrals(){
        return $this->hasMany(PatientReferral::class, 'referrer_id', 'id');
    }
        
    function referral(){
        return $this->hasOne(PatientReferral::class, 'referred_id', 'id');
    }

    function referrals(){
        return $this->through('patientReferrals')->has('referred');
    }
        
    function patientReferrer(){
        return $this->hasOne(PatientReferral::class, 'referred_id', 'id');
    }

    function getCommissionAttribute(){
        return Settings::COMMISSION_FEE->value() * $this->patientReferrals->count();
    }

    function referrer(){
        return $this->through('patientReferrer')->has('referrer');
    }

    function scopeIsMarketer(Builder $query){
        $marketers = Marketer::pluck('user_id');
        return $query->whereIn('id', $marketers);
    }

    function getIsMarketerAttribute(){
        return Marketer::where('user_id', $this->id)?->exists();
    }

    function getRoleAttribute(){
        if(Marketer::where('user_id', $this->id)->first()) {
            return Role::MARKETER;
        }

        return Role::PATIENT;
    }


}
