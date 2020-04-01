<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index($id, Company $company)
    {
        return view('company.index',compact('company'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;

        Company::where('user_id',$user_id)->update([
            'address' => $request['address'],
            'phone' => $request['phone'],
            'website' => $request['website'],
            'slogan' =>$request['slogan'],
            'description' => $request['description']
        ]);

        return redirect()->back()->with('message','Company Successfully Updated!');

    }
}
