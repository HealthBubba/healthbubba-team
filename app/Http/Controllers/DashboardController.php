<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $query = Referral::query();
        $user = authenticated([]);

        $query = Referral::when($user->is_marketer, fn($query) => $query->whereRelation('referral', 'referrer_id', $user->id))
                    ->has('referral')
                    ->with('referral');

        $doctors = Referral::from($query)->whereType('doctor')->count(); 
        
        $patients = Referral::from($query)->whereType('patient')->count(); 
        
        $referrals_count = Referral::from($query)->latest('created_at')->count();
        
        $referrals = Referral::from($query)->limit(10)->latest('created_at')->get();

        $users = Referral::isMarketer()->withCount('referrals')->orderBy('referrals_count', 'desc')->limit(10)->get();
        
        $marketers = Referral::isMarketer()->count();

        return view('dashboard', compact('doctors', 'patients', 'users', 'marketers', 'referrals_count', 'referrals'));

    }
}
