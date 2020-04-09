@extends('layouts.main')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="mb-5 h3">{{$category_name}} Jobs</h2>
                    <div class="rounded border jobs-wrap">
                        @foreach($jobs as $job)
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}"
                               class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    <img src="{{asset('uploads/logo/'.$job->company->logo)}}" alt="Image"
                                         class="img-fluid mx-auto">
                                </div>
                                <div class="job-details h-100">
                                    <div class="p-3 align-self-center">
                                        <h3>{{$job->position}}</h3>
                                        <div class="d-block d-lg-flex">
                                            <div class="mr-3"><span class="icon-suitcase mr-1"></span>{{$job->company->cname}}</div>
                                            <div class="mr-3"><span class="icon-room mr-1"></span>{{str_limit($job->address,20)}}</div>
                                            <div class="mr-3"><span class="icon-money mr-1"></span>${{$job->salary}} / yr</div>
                                            <div><span class="icon-clock-o mr-1"></span>{{date('d-m-Y',strtotime($job->created_at))}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-category align-self-center">
                                    @if($job->type == 'full-time')
                                        <div class="p-3">
                                            <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                                        </div>
                                    @elseif($job->type == 'part-time')
                                        <div class="p-3">
                                            <span class="text-danger p-2 rounded border border-danger">{{$job->type}}</span>
                                        </div>
                                    @elseif($job->type == 'freelance')
                                        <div class="p-3">
                                            <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-md-12 text-center mt-5">
                        {{$jobs->appends(\Illuminate\Support\Facades\Input::except('page'))->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
