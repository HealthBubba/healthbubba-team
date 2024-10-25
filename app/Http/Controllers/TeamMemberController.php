<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeamMemberController extends Controller{

    function index(Request $request) {
        $users = User::isMarketer()->latest()->paginate();
        return view('user.index', compact('users'));
    }

    function show(Request $request, User $user) {
        return view('user.show', compact('user'));
    }

}
