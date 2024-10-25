<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    function destroy(User $user) {
        $user->delete();
        toast('User Account deleted successfully', 'Success')->success();
        return back();
    }
}
