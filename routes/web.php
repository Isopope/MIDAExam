<?php

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $restaurants=Restaurant::all()->take(10);
    return view('index',compact('restaurants'));
});
Route::post('/restaurantUpload',[RestaurantController::class,'restaurantUpload']);
Route::get('/RedirigerVers',[HomeController::class,'RedirigerVers'])->name('RedirigerVers');
Route::get('/restaurant',[HomeController::class,'restaurantview'])->name('restaurant');
Route::get('/repas',[HomeController::class,'repasview'])->name('repasview');
Route::get('/local',[HomeController::class,'localview'])->name('localview');
Route::get('/reservation',[ReservationController::class,'reservationview'])->name('reservation');
Route::get('/reservation/{id}/updateState', [ReservationController::class,'updateState'])->name('reservation.updateState');
Route::get('/reservation/{id}/updateStateR', [ReservationController::class,'updateStateR'])->name('reservation.updateStateR');
Route::get('/reservations',[HomeController::class,'reservationsview'])->name('reservations');
Route::get('/reservations/{id}',[HomeController::class,'deleteReservation'])->name('reservations.deleteReservation');


Route::get('/dashboard', function () {
    $auth_user=Auth::User()->name;
    $restaurants=Restaurant::all()->take(10);
    return view('dashboard',compact('auth_user','restaurants'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
