<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    function index () {
        $admins = User::isAdmin()->latest()->paginate();
        return view('admins.index', compact('admins'));
    }

    function destroy(User $user) {
        $user->delete();
        toast('User Account deleted successfully', 'Success')->success();
        return back();
    }
}
