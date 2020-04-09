<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $category = Category::where('id',$id)->first();
        $category_name = $category->name;
        $jobs = Job::where('category_id',$id)->paginate(20);
        return view('jobs.jobs-category',compact('jobs','category_name'));
    }
}
