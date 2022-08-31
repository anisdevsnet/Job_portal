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
        $request->validate([
            'company_name' => 'required|min:2|max:255',
            'slug' =>'required|min:2|max:255',
            'address' => 'required|min:2|max:255',
            'phone'=>'required|integer|min:0|max:10000',
            'website' => 'required',
            'slogan' => 'required',
            'description' => 'required'
        ]);
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
