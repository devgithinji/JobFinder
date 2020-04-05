@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 m-2">
                <search-component></search-component>
            </div>
            <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            @if(!empty($company->logo))
                                <img src="{{asset('uploads/logo/'.$company->logo)}}" width="80"
                                     alt="">
                            @else
                                <img src="{{asset('uploads/logo/man.jpg')}}" width="80" alt="">
                            @endif
                        </td>
                        <td>Position:{{$job->position}}
                            <br>
                            <i class="fa fa-clock" aria-hidden="true"></i>
                            &nbsp;{{$job->type}}
                        </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>
                            &nbsp;{{$job->address}}
                        </td>
                        <td>
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            &nbsp;Date:{{$job->created_at->diffForHumans()}}
                        </td>
                        <td>
                            @guest
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                    <button class="btn btn-success btn-sm">Apply</button>
                                </a>
                            @else
                                @if(!$job->checkApplication())
                                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                        <button class="btn btn-success btn-sm">Apply</button>
                                    </a>
                                @else
                                    <p>Already applied</p>
                                @endif
                            @endguest
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('alljobs')}}">
                <button class="btn btn-success btn-lg" style="width:100%;">Browse all jobs</button>
            </a>
        </div>
        <br><br>
        <h1>Featured Companies</h1>
        <div class="container">
            <div class="row">
               @foreach($companies as $company)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img  src="{{asset('uploads/logo/'.$company->logo)}}" alt=""
                                 width="60%">
                            <div class="card-body">
                                <h5 class="card-title">{{$company->cname}}</h5>
                                <p class="card-text">{{str_limit($company->description,20)}}</p>
                                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-outline-primary">Visit Company</a>
                            </div>
                        </div>
                    </div>
                   @endforeach
            </div>
        </div>
    </div>
@endsection

<style>
    .fa {
        color: #4183D7;
    }
</style>
