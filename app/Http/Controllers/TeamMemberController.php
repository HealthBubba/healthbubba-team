<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeamMemberController extends Controller{

    function index(Request $request) {
        $users = User::isMarketer()
                    ->withCount('referrals')
                    ->orderByDesc('referrals_count')->paginate();
        return view('user.index', compact('users'));
    }

    function show(Request $request, User $user) {
        $query = $user->referrals();
        $doctors = $user->referrals()->whereType('doctor')->count(); 
        $patients = $user->referrals()->whereType('patient')->count(); 
        $referrals = $query->whereNotNull('referral_code')->latest('created_at')->paginate();
        return view('user.show', compact('user', 'referrals', 'patients', 'doctors'));
    }

}
