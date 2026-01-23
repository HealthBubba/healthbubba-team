<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientReferral extends Model {
    protected $fillable = ['referrer_id', 'referred_id', 'referral_code', 'status', 'activated_at', 'activation_appointment_id', 'flag_reason', 'created_at', 'updated_at'];

    function referrer() {
        return $this->hasOne(Referral::class, 'id', 'referrer_id');
    }

    function referred() {
        return $this->hasOne(Referral::class, 'id', 'referred_id');
    }
}
