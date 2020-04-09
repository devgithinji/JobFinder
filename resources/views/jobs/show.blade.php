@extends('layouts.main')
@section('content')
    <div class="album text-muted">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            @if(Session::has('err_message'))
                <div class="alert alert-dander">
                    {{Session::get('err_message')}}
                </div>
            @endif
            @if(isset($errors) && count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row" id="app">
                <div class="title my-3">
                    <h2 class="text-muted"><strong>{{$job->position}}</strong></h2>

                </div>

                <img src="{{asset('hero-job-image.jpg')}}" style="width: 100%;">

                <div class="col-lg-8">
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Description <a href="#" class="float-right" id="mailable">Share
                                Job<i class="fas fa-envelope-square fa-1x text-success m-2"></i></a></h3>
                        <p>{{$job->description}}</p>
                    </div>

                    <div class="p-4 mb-8 bg-white">
                        <!--icon-align-left mr-3-->
                        <h3 class="h5 text-black mb-3">Roles and Responsibilities</h3>
                        <p>{{$job->roles}}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Number of Vacancy</h3>
                        <p>{{$job->number_of_vacancy}}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Experience</h3>
                        <p>{{$job->experience}}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Gender</h3>
                        <p>{{$job->gender}}</p>

                    </div>
                    <div class="p-4 mb-8 bg-white">
                        <h3 class="h5 text-black mb-3">Salary</h3>
                        <p>${{$job->salary}} /yr</p>
                    </div>

                </div>


                <div class="col-md-4 p-4 site-section bg-light">
                    <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                    <p><strong>Company name: </strong> {{$job->company->cname}}</p>
                    <p><strong>Address: </strong>{{$job->address}}</p>
                    <p><strong>Employment Type:</strong> {{$job->type}}</p>
                    <p><strong>Title:</strong> {{$job->title}}</p>
                    <p><strong>Posted:</strong> {{$job->created_at->diffForHumans()}}</p>
                    <p><strong>Last date to apply:</strong> {{ date('F d, Y', strtotime($job->last_date)) }}</p>

                    <p>
                        <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"
                           class="btn btn-warning" style="width: 100%;">
                            Visit Company Page
                        </a>
                    </p>
                    <p>
                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                            @if(!$job->checkApplication())
                                <apply-component :jobid={{$job->id}}></apply-component>
                            @endif
                            <br>
                            <favourite-component
                                :jobid={{$job->id}} :favourited={{$job->checkSaved()?'true':'false'}}></favourite-component>
                        @endif
                    </p>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>More Jobs</h2>
                </div>
            </div>
            <div class="row justify-content-center mt-2">

                {{--recommendation--}}
                @foreach($jobRecommendations as $jobRecommendation)
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <p class="badge badge-success">{{$jobRecommendation->type}}</p>
                            <h5 class="card-title">{{$jobRecommendation->position}}</h5>
                            <p class="card-text">{{str_limit($jobRecommendation->description,90)}}</p>
                            <center><a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}"
                                       class="btn btn-success">Apply</a></center>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <br>
            <br>

        </div>
    </div>
@endsection




<!-- Modal -->
<div class="modal fade" id="mailablemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{route('mail')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Share Job to others</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="job_id" value="{{$job->id}}">
                    <input type="hidden" name="job_slug" value="{{$job->slug}}">
                    <div class="form-group">
                        <label for="">Your Name *</label>
                        <input type="text" class="form-control" name="your_name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Your Email *</label>
                        <input type="email" class="form-control" name="your_email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Recipient Name *</label>
                        <input type="text" class="form-control" name="friend_name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Recipient Email *</label>
                        <input type="email" class="form-control" name="friend_email" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


