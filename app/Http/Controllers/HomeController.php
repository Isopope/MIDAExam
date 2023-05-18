<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function RedirigerVers(){
        $user_role=Auth::User()->user_role;

        if($user_role==='client'){
            return view('/dashboard');
        }else{
            return view('/adminview');
        }
    }

    public function restaurantview(){
        return view('/restaurant');
    }

    public function repasview(){
        return view('/repas');
    }

    public function localview(){
        return view('/local');
    }

    public function reservationview(){
        return view('/reservation');
    }
    
    public function reservationsview(){
        return view('/reservationsclient');
    }
    
}
