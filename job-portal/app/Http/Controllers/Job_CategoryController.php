<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Job_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Job_CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Job_Category::orderBy('category_id','DESC')->get();
 
        $companies = Company::select('id','company_name')->where('user_id','=', Auth::user()?->id)->get();
        return  view('Jobs.jobs',compact('categories','companies'));

        //$job_category['job_categories']=DB::table('job_categories')->orderBy('name','asc')->get();
        //return view('Jobs.cateagory',compact('job_category'));
        //return dd($job_category);
        //return DB::select("select * From job_categories");
        
        //return view('Jobs.cateagory',$job_category);
        
    }
    public function getData()
    {
        return Job_Category::orderBy('category_id','DESC')->get();
    }
    public function category(Request $r)
    {    
        Job_Category::create($r->all()); 
        return ['success'=>true, 'message'=>"Inserted Successfully"];
    }
    public function postUpdate(Request $r)
    {
        if($r->has('category_id'))
        {
            Job_Category::find($r->input('category_id'))->update($r->all());
            return ['success'=>true,'message'=>"Updated Successfully"];
        }
    }
    public function postDelete($id)
    { 
        {
            Job_Category::findorFail($id)->delete();
         
            return response()->json(['success'=>'Deleted successfully.']);
        }

   }
        
    
}
