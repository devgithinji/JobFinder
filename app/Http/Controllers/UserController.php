<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['seeker','verified']);
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'address' => 'required',
            'bio' =>'required|min:20',
            'experience' => 'required|min:20',
            'phone_number' => 'required|regex:/(25)[0-9]{9}/'
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => $request['address'],
            'phone_number' => $request['phone_number'],
            'experience' => $request['experience'],
            'bio' => $request['bio']
        ]);

        return redirect()->back()->with('message', 'Profile Successfully Updated');
    }

    public function uploads(Request $request)
    {
        $user_id = auth()->user()->id;
        $field_name = $request['field'];

        $profile = Profile::where('user_id', $user_id)->first();

        if ($request->file('cover_letter')) {

            $this->validate($request,[
                'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000'
            ]);

            $cover_letter = $profile['cover_letter'];

            if (!$cover_letter == null) {

                Storage::delete($cover_letter);

            }

            $cover = $request->file('cover_letter')->store('public/files');
            $profile->update([
                'cover_letter' => $cover
            ]);

            return redirect()->back()->with('message', 'Cover Letter Successfully Updated');

        } elseif ($request->file('resume')) {

            $this->validate($request,[
                'resume' => 'required|mimes:pdf,doc,docx|max:20000'
            ]);

            $resume = $profile->resume;


            if (!$resume == null) {

                Storage::delete($resume);

            }

            $resume = $request->file('resume')->store('public/files');
            $profile->update([
                'resume' => $resume
            ]);

            return redirect()->back()->with('message', 'Resume Successfully Updated');
        } else {

            if ($field_name == 'cover'){
                $this->validate($request,[
                    'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000'
                ]);
            }elseif ($field_name == 'resume'){
                $this->validate($request,[
                    'resume' => 'required|mimes:pdf,doc,docx|max:20000',
                ]);
            }

        }


    }

    public function avatar(Request $request){
        $this->validate($request,[
            'avatar' => 'required|mimes:jpeg,jpg,png|max:20000'
        ]);

        $user_id = auth()->user()->id;
        $profile =  Profile::where('user_id',$user_id)->first();
        $profile_avatar = $profile['avatar'];
        $directory = 'uploads/avatar';
        if (!$profile_avatar == null){
          File::delete($directory.'/'.$profile_avatar);
        }
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move($directory,$filename);
            $profile ->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('message', 'Profile picture Successfully Updated');
        }

    }
}
