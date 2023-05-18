<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;

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
Route::get('/RedirigerVers',[HomeController::class,'RedirigerVers']);
Route::get('/restaurant',[HomeController::class,'restaurantview']);
Route::get('/repas',[HomeController::class,'repasview']);
Route::get('/local',[HomeController::class,'localview']);
Route::get('/reservation',[HomeController::class,'reservationview']);
Route::get('/reservations',[HomeController::class,'reservationsview']);


Route::get('/dashboard', function () {
    $auth_user=Auth::User()->name;
    $restaurants=Restaurant::all()->take(10);
    return view('dashboard',compact('auth_user','restaurants'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
