@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                            @forelse($jobs as $job)
                                <tr>
                                    <td>
                                        @if(empty(Auth::user()->company->logo))
                                            <img src="{{asset('avatar/man.jpg')}}" alt="" width="80">
                                        @else
                                            <img src="{{asset('uploads/logo/'.Auth::user()->company->logo)}}" alt=""
                                                 width="50">
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
                                        <div class="d-inline">
                                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                                <button class="btn btn-success btn-sm">View</button>
                                            </a>
                                            <a href="{{route('job.edit',[$job->id])}}">
                                                <button class="btn btn-secondary btn-sm">Edit</button>
                                            </a>
                                        </div>
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
        </div>
    </div>
@endsection
