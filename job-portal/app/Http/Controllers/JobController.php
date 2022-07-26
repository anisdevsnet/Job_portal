<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Controllers\Job_CategoryController;
use App\Models\Job_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    //
    public function index()
    {
        return view('Jobs.jobs');
    }
    public function list()
    {
        $job = Job::all();
        return view ('Company.joblist',['jobs'=>$job]);
    }
    public function store(Request $req)
    {
        $job= Job::where('user_id','=', Auth::user()?->id )->first();
        
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
