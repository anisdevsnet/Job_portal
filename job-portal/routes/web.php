<?php

use App\Http\Controllers\loginandreg;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

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
    return view('backend.auth.login');
});

Route::post('register-user',[loginandreg::class,'registeruser'])->name('register-user');
Route::post('login-user',[loginandreg::class,'loginuser'])->name('login-user');

Route::get('logout',[loginandreg::class,'logout'])->name('logout');



Route:: group(['middleware'=>['isAdmin']],function(){
    Route::get('login',[loginandreg::class,'login']);
    Route::get('registration',[loginandreg::class,'registration']);
    Route::get('/home',[loginandreg::class,'index']);
});
