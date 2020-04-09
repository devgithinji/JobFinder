<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{

    /**
     * EmployerRegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function employerRegister(Request $request)
    {

        $this->validate($request, [
            'cname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'email' => $request['email'],
            'user_type' => $request['user_type'],
            'password' => Hash::make($request['password']),
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => str_slug(request('cname'))
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->to('email/verify ')->with('message', 'Please verify your email by clicking the link sent to your email address');
    }
}
