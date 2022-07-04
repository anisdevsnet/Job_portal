<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginandreg extends Controller
{
    public function login()
    {
         return view ('backend.auth.login');
    }
 
    public function registration()
    {
             return view ('backend.auth.registration');
    }
    public function registeruser(Request $request)
    {


       $input = request() -> validate([
          'name'=>'required',
          'email'=>'required',
          'password'=>'required',
       ]);
       $user = new User();
       $user -> name = $request -> input ('name');
       $user -> email = $request -> input ('email');
       $user -> password = Hash::make ($request ->input ('password'));
       $request= $user->save();

       $profile = Profile::create([
         'user_id'=>$user->id,
         
         
       ]);
         //dd($profile->all());
       $profile->save();

       if($request){
          return back()->with('success','You have registered successfully');
       }else{
          return back()->with('fail','Something wrong');
       }
 
    }
    public function loginuser(Request $request)
    {
       $input = request()-> validate([
 
          'email'=>'required',
          'password'=>'required',
 
       ]);
       $user = User::where('email','=',$request->email)->first();
       if($user){
          if(Hash::check($request->password, $user->password)){
             $request ->session()->put('loginId',$user->id);
             return view('Profile.profile');
          }else{
             return back()->with('fail','password does not match');
          }
       }else{
          return back()->with('fail','this email is not registered');
       }
    }
    public function index()
    {
       return view('Profile.profile');
    }
    public function logout()
    {
       session()->forget(['loginId']);
       return view('backend.auth.login');
    }
}
