@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            <img src="{{asset('cover/tumblr-image-sizes-banner.png')}}" style="width: 100%;" alt="">
            <div class="company-desc">
                <img src="{{asset('avatar/man.jpg')}}" width="100" alt="">
                <p>{{$company->description}}</p>
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp;Phone-{{$company->phone}}&nbsp;Website-{{$company->website}}</p>
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
            @foreach($company->jobs as $job)
                <tr>
                    <td><img src="{{asset('avatar/man.jpg')}}" alt="" width="80"></td>
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
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
