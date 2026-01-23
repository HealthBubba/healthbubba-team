<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;

class TeamMemberController extends Controller{

    function index(Request $request) {
        $users = Referral::isMarketer()
                    ->withCount('referrals')
                    ->when($request->keyword, function($query, $keyword){
                        $query->where('first_name', 'LIKE', "%{$keyword}%")
                            ->orWhere('last_name', 'LIKE', "%{$keyword}%")
                            ->orWhere('email', 'LIKE', "%{$keyword}%")
                            ->orWhere('referral_code', 'LIKE', "%{$keyword}%");
                    })
                    ->orderByDesc('referrals_count')
                    ->paginate();
        return view('user.index', compact('users'));
    }

    function show(Request $request, Referral $user) {
        // $query = $user->referrals();

        $query = Referral::when($user->is_marketer, fn($query) => $query->whereRelation('referral', 'referrer_id', $user->id))
                        ->has('referral')
                        ->with('referral');

        $doctors = Referral::from($query)->whereType('doctor')->count(); 
        $patients = Referral::from($query)->whereType('patient')->count(); 
        $referrals = Referral::from($query)->whereNotNull('referral_code')->latest('created_at')->paginate();
        $referrals_count = Referral::from($query)->whereNotNull('referral_code')->latest('created_at')->count();
        return view('user.show', compact('user', 'referrals', 'patients', 'doctors', 'referrals_count'));
    }

}
