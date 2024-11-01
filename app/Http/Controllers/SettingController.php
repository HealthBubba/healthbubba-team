<?php

namespace App\Http\Controllers;

use App\Enums\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index(){
        return view('settings');
    }
}
