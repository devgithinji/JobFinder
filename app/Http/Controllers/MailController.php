<?php

namespace App\Http\Controllers;

use App\Mail\SendJob;
use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request,[
            'your_name' => 'required|string',
            'your_email' => 'required|email',

            'friend_name' => 'required|string',
            'friend_email' => 'required|email',

        ]);
        $homeUrl = url('/');
        $jobId = $request['job_id'];
        $jobSlug = $request['job_slug'];

        $jobUrl = $homeUrl . '/' . 'jobs/' . $jobId . '/' . $jobSlug;

        $data = array(
            'job_link' => $jobUrl,
            'your_name' => $request['your_name'],
            'your_email' => $request['your_email'],
            'friend_name' => $request['friend_name'],
        );

        $emailTo = $request['friend_email'];

        try{
            Mail::to($emailTo)->send(new SendJob($data));
            return redirect()->back()->with('message','Job sent to'.$emailTo);
        }catch (\Exception $e){
            return redirect()->back()->with('err_message','Sorry something went wrong. Please try later');
        }



    }
}
