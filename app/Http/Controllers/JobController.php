<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use App\Http\Requests\JobPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    /**
     * JobController constructor.
     */
    public function __construct()
    {
        $this->middleware(['employer','verified'])->except('index', 'show', 'apply', 'allJobs','searchJobs');
    }

    public function index()
    {
        $jobs = Job::latest()->limit(10)->where('status', 1)->get();
        $companies = Company::get()->random(12);
        return view('welcome', compact('jobs', 'companies'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {


        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => $request['title'],
            'slug' => str_slug($request['title']),
            'description' => $request['description'],
            'roles' => $request['roles'],
            'category_id' => $request['category_id'],
            'position' => $request['position'],
            'address' => $request['address'],
            'type' => $request['type'],
            'status' => $request['status'],
            'last_date' => $request['last_date']
        ]);

        return redirect()->to(route('my.job'))->with('message', 'Job posted successfully');
    }

    public function myjob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {

        $job = Job::findOrFail($id);
        $job->title = $request['title'];
        $job->description = $request['description'];
        $job->roles = $request['roles'];
        $job->category_id = $request['category_id'];
        $job->position = $request['position'];
        $job->address = $request['address'];
        $job->type = $request['type'];
        $job->status = $request['status'];
        $job->last_date = $request['last_date'];

        if ($job->isClean()) {
            return redirect()->back()->with('message', 'Please make changes to update job');
        }

        $job->update($request->all());

        return redirect()->to(route('my.job'))->with('message', 'Job successfully updated');
    }

    public function apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);

        return redirect()->back()->with('message', 'Job Application successfully');

    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function allJobs(Request $request)
    {

        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        if ($keyword || $type || $category || $address) {
            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', $type)
                ->orWhere('category_id', $category)
                ->orWhere('address', $address)
                ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        } else {
            $jobs = Job::paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }


    }

    public function searchJobs(Request $request){
        $keyword = $request->get('keyword');
        $users = Job::where('title','like','%'.$keyword.'%')
            ->orWhere('position','like','%'.$keyword.'%')
            ->limit(5)->get();
        return response()->json($users);
    }
}
