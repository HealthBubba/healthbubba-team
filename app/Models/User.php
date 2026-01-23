<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Concerns\HasStatus;
use App\Enums\Role;
use App\Enums\Settings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;

class User extends Authenticatable {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasStatus, Impersonate;

    protected $fillable = [ 'firstname', 'lastname', 'email', 'password', 'code', 'role' ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => Role::class
        ];
    }

    function scopeIsAdmin($query){
        return $query->whereIn('role', [Role::ADMIN, Role::SUPERADMIN]);
    }

    // function scopeIsMarketer($query) {
    //     return $query->whereRole(Role::MARKETER);
    // }

    function referrals(){
        return $this->setConnection('main')->hasMany(Referral::class, 'referral_code', 'code');
    }

    function getNameAttribute(){
        return implode(' ', [$this->firstname, $this->lastname]);
    }

    function getCommissionAttribute(){
        return Settings::COMMISSION_FEE->value() * $this->referrals->count();
    }

    function getIsAdminAttribute(){
        return in_array($this->role, [Role::ADMIN, Role::SUPERADMIN]);
    }

    // function getIsMarketerAttribute(){
    //     return $this->role == Role::MARKETER;
    // }

    public function canImpersonate(): bool {
        return $this->is_admin;
    }
    
    // public function canBeImpersonated(): bool {
    //     return $this->is_marketer;
    // }

}
