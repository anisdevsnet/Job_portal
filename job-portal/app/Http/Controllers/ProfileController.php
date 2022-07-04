<?php

namespace App\Http\Controllers;

//use auth;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        
         return view ('Profile.profile');
         
    }
    public function store(Request $request)
    {
        
        // $validator = Validator::make($request->all(),[
        //     'dob' => 'required',
        //     'gender' => 'required',
        //     'phone_number' => 'required', 
        //     'address' => 'required',
        // ]);

    // Start
      $profile = Profile::where('user_id','=', Auth::user()->id)->first();
      $profile->dob = $request->dob ?? '';
      $profile->gender = $request->gender ?? '';
      $profile->address = $request->address ?? '';
      $profile->objective = $request->objective ?? '';
      $profile->experience = $request->experience ?? '';
      $profile->bio = $request->bio ?? '';
      $profile->phone_number = $request->phone_number ?? '';

      $profile->save();

    //End






        //dd($request->all());
       //$user_id =  Auth::user()?->id;
        /*Profile::where('user_id', '=', Auth::user()?->id)->update([
            /*'address'=>request('address'),
            'gender'=>request('gender'),
            'dob'=>request('dob'),
            'objective'=>request('objective'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
            $request->address, 
            $request->gender,    
            $request->dob,
            $request->objective,
            $request->experience,
            $request->bio,
        ]);
        
        $input = request()->validate([
           // 'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'objective' => 'required',
            'experience' => 'required',
            'bio' => 'required',
            
            
        ]);
        //
        //dd($request->all());
        

        $user_id =  auth()->user()?->id; 
        $profile = Profile::find(auth()->user()?->id);
      
       //$profile = new Profile();
       
         $request->address??''; 
         $request->gender??''; 
         $request->dob??''; 
         $request ->iphone_number??'';
         $request->objective??''; 
         $request->experience??''; 
         $request->bio??''; 

        //$profile = Profile::where('user_id', '=', auth()->user()?->first());

        
        $profile->save();*/
        
        return redirect()->back()->
        with('message','Your Profile Updated Successfully');
    }
    public function coverletter(Request $request)
    {
        $user_id = Auth::user()?->id;
        $cover = $request ->file (key:'cover_letter')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter'=>$cover
        ]);
        return redirect()->back()->
        with('message','Your Cover Letter update Successfully');
    }
    public function resume(Request $request)
    {
        $user_id = Auth::user()?->id;
        $resume = $request ->file (key:'resume')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume
        ]);
        return redirect()->back()->
        with('message','Your Resume update Successfully');
    }

}
