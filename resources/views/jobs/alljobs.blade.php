@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{route('alljobs')}}" method="GET">
                <div class="form-inline">
                    <div class="form-group">
                        <label>Keyword&nbsp;</label>
                        <input type="text" name="title" class="form-control">&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label>Employment type</label>
                        <select class="form-control" name="type" id="">
                            <option value="">--select--</option>
                            <option value="fulltime">full-time</option>
                            <option value="parttime">part-ime</option>
                            <option value="casual">casual</option>
                            <option value="freelancer">freelance</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach(App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control">&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>
                </div>
            </form>
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
                            @elseguest
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
            {{$jobs->appends(\Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
    </div>
@endsection

<style>
    .fa {
        color: #4183D7;
    }
</style>
