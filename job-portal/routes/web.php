<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\loginandreg;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});
/*
Route::post('register-user',[loginandreg::class,'registeruser'])->name('register-user');
Route::post('login-user',[loginandreg::class,'loginuser'])->name('login-user');

Route::get('login',[loginandreg::class,'login']);
Route::get('registration',[loginandreg::class,'registration']);

Route::group(['middleware'=>['disable_back_btn']],function(){

   Route:: group(['middleware'=>['isAdmin']],function(){

    
    Route::get('/home',[loginandreg::class,'index']);   

});
});

Route::get('logout',[loginandreg::class,'logout'])->name('logout');*/
 


Route::get('profile',[ProfileController::class,'index']);
Route::post('profile/store',[ProfileController::class,'store'])->name('profile.store');
Route::post('profile/coverletter',[ProfileController::class,'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[ProfileController::class,'resume'])->name('profile.resume');
Route::post('profile/avatar',[ProfileController::class,'avatar'])->name('profile.avatar');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
