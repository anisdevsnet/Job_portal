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

    // Start
      $company = Company::where('user_id','=', Auth::user()?->id )->first();
      $company->company_name = $request->company_name ?? '';
      $company->slug = $request->slug ?? '';
      $company->address = $request->address ?? '';
      $company->phone = $request->phone ?? '';
      $company->website = $request->website ?? ''; 
      $company->slogan = $request->slogan ?? '';
      $company->description = $request->description ?? '';
      $company->save();

    //End
        return redirect()->back()->
        with('message','Your Profile Updated Successfully');
    }

    public function cover_photo(Request $request)
    {
        
        $user_id = auth()->user()->id;
        if($request->hasfile('cover_photo')) 
        {
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/image/', $filename);
           Company::where('user_id',$user_id)->update([
            'cover_photo'=>$filename
           ]);
        }

        return redirect()->back()->
        with('message','Your Cover Photo updated Successfully');
    }
    public function logo(Request $request)
    {
        
        $user_id = auth()->user()->id;
        if($request->hasfile('logo')) 
        {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/image/', $filename);
           Company::where('user_id',$user_id)->update([
            'logo'=>$filename
           ]);
        }

        return redirect()->back()->
        with('message','Your Logo updated Successfully');
    }
   
}
