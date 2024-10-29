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
        $referrals = $query
                        // ->when(!$request->date, fn($query) => $query->where('created_at', '>=', now()->subDays(30)))
                        // ->when($request->date, function($query, $date){
                        //     $date = explode(' - ', $date);
                        //     // [$start, $end] = explode(' - ', $date);
                        //     $query->whereBetween('created_at', $date);
                        //     // $query->whereDate('created_at', '>=', $start)
                        //     //         ->whereDate('created_at', '<=', $end);
                        // })
                        ->latest('created_at')->paginate();
        return view('user.show', compact('user', 'referrals', 'patients', 'doctors'));
    }

}
