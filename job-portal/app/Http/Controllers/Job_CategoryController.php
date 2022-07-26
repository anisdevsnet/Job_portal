<?php

namespace App\Http\Controllers;

use App\Models\Job_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Job_CategoryController extends Controller
{
    //
    public function index()
    {
        $job_category = Job_Category::all();
        //return dd($job_category);
        //return DB::select("select * From job_categories");
        return view('Jobs.jobs',compact('job_category'));
        
       // return view ('Jobs.jobs',['job_category'=>$job_category]);
    }
    public function category(Request $req)
    {
        $job_category= new Job_Category();
        $job_category->name = $req->name ?? '';
        $job_category->save();

        return redirect()->back()->
        with('message','New Category updated successfully');
    }
    public function destroy($category_id)
    {
        Job_Category::destroy($category_id);
        return redirect()->back->with('flash_message', 'Category deleted!');  
    }
}
