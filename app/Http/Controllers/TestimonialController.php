<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(){
        $testimonials = Testimonial::latest()->paginate(20);

        return view('testimonial.index',compact('testimonials'));
    }


    public function create(){

        return view('testimonial.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'content' => 'required|min:40|max:500',
            'name' => 'required|string',
            'profession' => 'required|string',
            'video_id' => 'required|integer',
        ]);
        Testimonial::create([
            'content' => $request['content'],
            'name' => $request['name'],
            'profession' => $request['profession'],
            'video_id' => $request['video_id']
        ]);

        return redirect()->route('testimonial.show')->with('message','Testimonial was created successfully');
    }

    public function edit($id){

        $testimonial = Testimonial::findOrFail($id);

        return view('testimonial.edit',compact('testimonial'));

    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'content' => 'required|min:40|max:500',
            'name' => 'required|string',
            'profession' => 'required|string',
            'video_id' => 'required|integer',
        ]);

        Testimonial::where('id',$id)->update([
            'content' => $request['content'],
            'name' => $request['name'],
            'profession' => $request['profession'],
            'video_id' => $request['video_id']
        ]);

        return redirect()->route('testimonial.show')->with('message','Testimonial was updated successfully');

    }

    public function delete($id){
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonial.show')->with('message','Testimonial was deleted successfully');
    }
}
