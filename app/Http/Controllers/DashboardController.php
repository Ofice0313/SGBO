<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::User()->role == "USER")
        {
            echo "U";die();
        }else if(Auth::User()->role == "ADMIN")
        {
            echo "A";die();
        }
    }
}
