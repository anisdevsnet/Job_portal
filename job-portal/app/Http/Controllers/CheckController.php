<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public function checkUserType(){
        if (!Auth::user()){
            return redirect()->route('login');
        }
        if(Auth::user()->user_type ==='job_seeker'){
            
            return redirect()->route('Profile.profile');
        }
        if(Auth::user()->user_type === 'company'){
            return redirect()->route('Company.companies');
        }
    }
}
