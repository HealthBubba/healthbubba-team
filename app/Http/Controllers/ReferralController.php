<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    
    function index(Request $request) {
        $user = Auth::user();
        $doctors = Referral::isFromTeam()->when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))->whereNotNull('referral_code')->whereType('doctor')->count(); 
        $patients = Referral::isFromTeam()->when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))->whereNotNull('referral_code')->whereType('patient')->count(); 

        $referrals = Referral::isFromTeam()->when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))
                        ->whereNotNull('referral_code')
                        ->latest('created_at')->paginate();

        $referrals_count = Referral::isFromTeam()->when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))
                        ->whereNotNull('referral_code')->count();

        return view('referrals.index', compact('doctors', 'patients', 'referrals', 'referrals_count'));
    }

}
