<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\loginandreg;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckController;

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
/*Route::get('/',function(){
    return view ('welcome');
});*/

Route::get('/',[CheckController::class,'checkUserType']) ;
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
 
Route::get('/job_seeker/dashboard',function(){
    return view('Profile.profile');
})->name('Profile.profile');
Route::get('/comany/dashboard',function(){
    return view(('Company.companies'));
})->name('Company.companies');
//Profile Page Route Start

Route::get('profile',[ProfileController::class,'index']);
Route::post('profile/store',[ProfileController::class,'store'])->name('profile.store');
Route::post('profile/coverletter',[ProfileController::class,'coverletter'])->name('profile.coverletter');
Route::post('profile/resume',[ProfileController::class,'resume'])->name('profile.resume');
Route::post('profile/avatar',[ProfileController::class,'avatar'])->name('profile.avatar');

//Profile Page Route End

//Companies Route Start

Route::get('companies',[CompaniesController::class,'index']);
Route::post('companies/store',[CompaniesController::class,'store'])->name('companies.store');
Route::post('companies/coverletter',[CompaniesController::class,'coverletter'])->name('companies.coverletter');
Route::post('companies/resume',[CompaniesController::class,'resume'])->name('companies.resume');
Route::post('companies/avatar',[CompaniesController::class,'avatar'])->name('companies.avatar');



//Companies Route End




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
