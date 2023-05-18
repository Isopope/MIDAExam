<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function RedirigerVers(){
        $restaurants=Restaurant::all()->take(10);
        $user_role=Auth::User()->user_role;

        if($user_role==='client'){
            return view('/dashboard',compact('restaurants'));
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
