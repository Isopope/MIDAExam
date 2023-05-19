<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    
    
    public function reservationsview(){
        $id_client=Auth::id();
        //$reservation=Reservation::join('restaurants','restaurants.id','=','reservations.restaurant_id')->join('users','users.id','=','reservations.user_id')->get('reservations.*','users.*','restaurants.*');
        $reservations=DB::select(DB::raw("SELECT  reservations.id as id_reservation,users.name as username,users.email as useremail,reservations.reservation_date as reservation_date, reservations.reservation_state as reservation_state,reservations.reservation_comment as reservation_comment,restaurants.resto_name as reservation_resto_name FROM reservations join restaurants on reservations.restaurant_id=restaurants.id join users on reservations.user_id=users.id where  reservations.user_id=$id_client"));
        
        return view('/reservationsclient',compact('reservations'));
    }

    public function deleteReservation($id){
        $deleteRes=Reservation::findOrFail($id);
        $deleteRes->delete();
        return redirect()->back();
        
    }
    
    
}
