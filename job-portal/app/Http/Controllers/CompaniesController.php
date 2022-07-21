<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    //
    public function index()
    {
        
         return view ('Company.companies');
         
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
      $com = Company::where('user_id','=', Auth::user()?->id)->first();
      $com->slug = $request->slug ?? '';
      $com->address = $request->address ?? '';
      $com->phone = $request->phone ?? '';
      $com->website = $request->website ?? '';
      $com->logo = $request->logo ?? '';
      $com->slogan = $request->slogan ?? '';
      $com->description = $request->description ?? '';

      $com->save();

    //End
        return redirect()->back()->
        with('message','Your Profile Updated Successfully');
    }
    public function coverletter(Request $request)
    {
        /*$profile = Profile::where('user_id','=', Auth::user()->id)->first();
        if($request->hasfile('coverletter')) 
        {
            $file = $request->file('coverletter');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/coverletter/', $filename);
            $profile->coverletter = $filename;
        }

        $profile->save();*/
        /*$profile->dob = $request->dob ?? '';*/
        $user_id = Auth::user()?->id;
        $cover = $request ->file (key:'cover_letter')->store('public/files');
        Company::where('user_id',$user_id)->update([
            'cover_letter'=>$cover
        ]);
        return redirect()->back()->
        with('message','Your Cover Letter update Successfully');
    }
    public function resume(Request $request)
    {
        
        $user_id = Auth::user()?->id;
        $resume = $request ->file (key:'resume')->store('public/files');
        Company::where('user_id',$user_id)->update([
            'resume'=>$resume
        ]);
        return redirect()->back()->
        with('message','Your Cover Letter update Successfully');
    }
    public function avatar(Request $request)
    {
        
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')) 
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/image/', $filename);
           Company::where('user_id',$user_id)->update([
            'avatar'=>$filename
           ]);
        }

      
        return redirect()->back()->
        with('message','Your Resume update Successfully');
    }
}
