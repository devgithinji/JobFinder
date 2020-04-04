<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified'])->except('index');
    }

    public function index($id, Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        Company::where('user_id', $user_id)->update([
            'address' => $request['address'],
            'phone' => $request['phone'],
            'website' => $request['website'],
            'slogan' => $request['slogan'],
            'description' => $request['description']
        ]);

        return redirect()->back()->with('message', 'Company Successfully Updated!');

    }

    public function uploads(Request $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        if ($request->hasFile('cover_photo')) {

            $cover_photo = $company['cover_photo'];
            $directory = 'uploads/coverphoto/';
            if (!$cover_photo == null) {
                File::delete($directory . $cover_photo);
            }
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($directory, $filename);
            $company->update([
                'cover_photo' => $filename
            ]);

            return redirect()->back()->with('message', 'Company cover photo Successfully Updated!');
        } elseif ($request->hasFile('logo')) {
            $logo = $company['logo'];
            $directory = 'uploads/logo/';
            if (!$logo == null) {
                File::delete($directory . $logo);
            }
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($directory, $filename);
            $company->update([
                'logo' => $filename
            ]);

            return redirect()->back()->with('message', 'Company logo Successfully Updated!');
        }
    }

}
