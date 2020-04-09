<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(){
        $posts = Post::latest()->paginate(20);
        return view('admin.index',compact('posts'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|min:3',
            'content' => 'required|min:200',
            'image' =>'required|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                'title' => $request['title'],
                'slug' => str_slug($request['title']),
                'content' => $request['content'],
                'image' => $path,
                'status' => $request['status']
            ]);
        }

        return redirect('/dashboard')->with('message','Post created successfully');
    }

    public function editPost($id){
    $post = Post::findOrFail($id);
    return view('admin.edit',compact('post'));
    }

    public function update(Request $request,$id){
       $this->validate($request,[
           'title' => 'required',
           'content' => 'required',
           'image' => 'mimes:jpeg,jpg,png'
       ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::where('id',$id)->update([
                'title' => $request['title'],
                'content' => $request['content'],
                'image' => $path,
                'status' => $request['status']
            ]);
        }

        $this->updateAllExceptImage($request,$id);

        return redirect()->back()->with('message','Post updated successfully');
    }

    public function updateAllExceptImage(Request $request,$id){

      return  Post::where('id',$id)->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'status' => $request['status']
        ]);
    }

    public function deletePost($id){

        $post = Post::findOrFail($id)->first();
        $post->delete();

        return redirect('/dashboard')->with('message','Post deleted successfully');
    }

    public function trash(){
        $posts = Post::onlyTrashed()->paginate(20);
        return view('admin.trash',compact('posts'));
    }

    public function restore($id){
        Post::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message','Post restored successfully');
    }

    public function toggle($id){
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();

        return redirect()->back()->with('message','Status updated successfully');
    }

    public function show($id){
        $post = Post::find($id);
        return view('admin.read',compact('post'));
    }

    public function jobsShow(){
        $jobs = Job::latest()->paginate(15);

        return view('admin.jobs_show',compact('jobs'));
    }

    public function CompaniesShow(){
        $companies = Company::latest()->paginate(15);

        return view('admin.companies_show',compact('companies'));
    }

    public function Jobtoggle($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();

        return redirect()->back()->with('message','Job status updated successfully');
    }

}
