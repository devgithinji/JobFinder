@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(Auth::user()->user_type == 'seeker')
                    @forelse($jobs as $job)
                        <div class="card m-3">
                            <div class="card-header">
                                {{$job->title}}
                                <br>
                                <small class="badge badge-primary">{{$job->position}}</small>
                            </div>
                            <div class="card-body">
                                {{$job->description}}
                            </div>
                            <div class="card-footer">
                            <span>
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">Read more..</a>
                            </span>
                                <span class="float-right">
                                Last date: {{date('d-m-Y',strtotime($job->last_date))}}</span>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            <p>No saved jobs yet</p>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection
