<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Controllers\Job_CategoryController;
use App\Models\Company;
use App\Models\Job_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    //
    public function index()
    {
        $categories =  Job_Category::get();
        
        $companies = Company::select('id','company_name')->where('user_id','=', Auth::user()?->id)->get();
        return view('Jobs.jobs',compact('categories','companies'));
        
        

        
    }
    public function list()
    {
        $jobs = Job::where('user_id','=',Auth::user()?->id)->get();
        return view ('Company.joblist',compact('jobs'));
    }
    public function store(Request $req)
    {

        $req -> validate([
            'title' => 'required||min:5|max:255',
            'address' => 'required||min:6|max:255',
            'description' => 'required|min:5|max:255',
            'job_position' => 'required',
            'category' => 'required',
            'slug' => 'required|min:5|max:255',
            'type' => 'required',
            'status'=> 'required',
            'last_date' => 'required'
        ]);
        
        $job = new Job();
        $job-> user_id = Auth::user()->id;
        $job->company_id = $req ->company_id;      
        $job-> title = $req -> title;
        $job->address = $req -> address;
        $job-> description = $req -> description;
        $job-> job_position = $req -> job_position;
        $job-> category = $req -> category;
        $job-> slug = $req -> slug;
        $job-> type = $req -> type;
        $job-> status = $req -> status;
        $job-> last_date = $req -> last_date;
        $job->save();

    //End
        return redirect()->back()->with('message','Your Information Updated Successfully');
    }
    
    
    
}
