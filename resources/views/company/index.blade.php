@extends('layouts.main')
@section('content')
    <div class="album text-muted">
        <div class="container">

            <div class="row" id="app">
                <div class="title" style="margin-top: 20px;">
                    <h2></h2>

                </div>
                @if(!empty($company->cover_photo))
                    <img src="{{asset('uploads/coverphoto/'.$company->cover_photo)}}" style="width: 100%;" alt="">
                @else
                    <img src="{{asset('uploads/coverphoto/tumblr-image-sizes-banner.png')}}"
                         style="width: 100%; height: 50%;" alt="">
                @endif

                <div class="col-lg-8">
                    <div class="p-4 mb-8 bg-white">
                        <div class="company-desc">
                            @if(empty($company->logo))
                                <img src="{{asset('avatar/man.jpg')}}" width="100" alt="">
                            @else
                                <img src="{{asset('uploads/logo/'.$company->logo)}}" width="100" alt="">
                            @endif
                            <p>{{$company->description}}</p>
                            <h1>{{$company->cname}}</h1>
                            <p><strong>Slogan</strong>- {{$company->slogan}}&nbsp;
                            <strong>Address</strong>- {{$company->address}}&nbsp;
                            <strong>Phone</strong>- {{$company->phone}}&nbsp;
                            <strong>Website</strong>- {{$company->website}}</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="p-4 mb-8 bg-white">
                        <h2 class="text-center">Jobs Posted</h2>
                        <table class="table">
                            <thead>
                            <th>Logo</th>
                            <th>Position</th>
                            <th>Address</th>
                            <th>Time Created</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @forelse($company->jobs as $job)
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
                                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                                <button class="btn btn-success btn-sm">Apply</button>
                                            </a>
                                        @else
                                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                                <button class="btn btn-success btn-sm">View</button>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-success text-center m-3">
                                    <p>No jobs posted yet</p>
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <br>
            <br>
            <br>

        </div>
    </div>
@endsection
