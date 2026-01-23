<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    
    function index(Request $request) {
        $user = Auth::user();

        $query = Referral::when($user->is_marketer, fn($query) => $query->whereRelation('referral', 'referrer_id', $user->id))
        ->has('referral')
        ->with('referral');

        $doctors = Referral::from($query)->whereType('doctor')->count(); 
        $patients = Referral::from($query)->whereNotNull('referral_code')->whereType('patient')->count(); 
        $referrals = Referral::from($query)->latest('created_at')->paginate();
        $referrals_count = Referral::from($query)->whereNotNull('referral_code')->count();


        return view('referrals.index', compact('doctors', 'patients', 'referrals', 'referrals_count'));
    }

}
