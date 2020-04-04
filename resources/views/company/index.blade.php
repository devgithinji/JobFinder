@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">
                @if(!empty($company->cover_photo))
                    <img src="{{asset('uploads/coverphoto/'.$company->cover_photo)}}" style="width: 100%;"
                         alt="">
                @else
                    <img src="{{asset('uploads/coverphoto/tumblr-image-sizes-banner.png')}}"
                         style="width: 100%; height: 50%;"
                         alt="">
                @endif
                <div class="company-desc">
                    @if(!empty($company->logo))
                        <img src="{{asset('uploads/logo/'.$company->logo)}}" width="100"
                             alt="">
                    @else
                        <img src="{{asset('uploads/logo/man.jpg')}}" width="100" alt="">
                    @endif
                    <p>{{$company->description}}</p>
                    <h1>{{$company->cname}}</h1>
                    <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp;Phone-{{$company->phone}}
                        &nbsp;Website-{{$company->website}}</p>
                </div>
            </div>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
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
@endsection
