<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $query = Referral::query();
        $user = authenticated();

        $doctors = Referral::when($user->is_marketer, fn($query) => $query->whereReferralCode($user->code))->isFromTeam()->whereNotNull('referral_code')->whereType('doctor')->count(); 
        
        $patients = Referral::when($user->is_marketer, fn($query) => $query->whereReferralCode($user->code))->isFromTeam()->whereNotNull('referral_code')->whereType('patient')->count(); 
        
        $referrals = Referral::when($user->is_marketer, fn($query) => $query->whereReferralCode($user->code))->isFromTeam()->whereNotNull('referral_code')->latest('created_at')->limit(10)->get();

        $users = User::isMarketer()->withCount('referrals')->orderBy('referrals_count', 'desc')->limit(10)->get(); 

        return view('dashboard', compact('doctors', 'patients', 'users', 'referrals'));

    }
}
