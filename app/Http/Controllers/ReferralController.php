<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    
    function index(Request $request) {
        $user = Auth::user();
        $doctors = Referral::when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))->whereNotNull('referral_code')->whereType('doctor')->count(); 
        $patients = Referral::when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))->whereNotNull('referral_code')->whereType('patient')->count(); 

        $referrals = Referral::when($user->is_marketer, fn($query) => $query->where('referral_code', $user->code))
                        // ->when(!$request->date, fn($query) => $query->where('created_at', '>=', now()->subDays(30)))
                        // ->when($request->date, function($query, $date){
                        //     $date = explode(' - ', $date);
                        //     // [$start, $end] = explode(' - ', $date);
                        //     $query->whereBetween('created_at', $date);
                        //     // $query->whereDate('created_at', '>=', $start)
                        //     //         ->whereDate('created_at', '<=', $end);
                        // })
                        ->whereNotNull('referral_code')
                        ->latest('created_at')->paginate();

        return view('referrals.index', compact('doctors', 'patients', 'referrals'));
    }

}
