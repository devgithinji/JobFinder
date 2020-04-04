@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit a Job</div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
                    <div class="card-body">
                        <form action="{{route('job.update',[$job->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$job->title}}">
                                @if($errors->has('title'))
                                    <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$job->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="roles">Role:</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{$job->roles}}</textarea>
                                @if($errors->has('roles'))
                                    <div class="error" style="color: red;">{{$errors->first('roles')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Category:</label>
                                <select name="category_id" class="form-control" id="">
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}"  {{$job->category_id == $cat->id ?'selected':''}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" name="position" class="form-control  @error('position') is-invalid @enderror" value="{{$job->position}}">
                                @if($errors->has('position'))
                                    <div class="error" style="color: red;">{{$errors->first('position')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$job->address}}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="form-control"  id="">
                                    <option value="fulltime" {{$job->type=='fulltime'?'selected':''}}>full-time</option>
                                    <option value="parttime"{{$job->type=='parttime'?'selected':''}}>part-ime</option>
                                    <option value="casual"{{$job->type=='casual'?'selected':''}}>casual</option>
                                    <option value="freelancer"{{$job->type=='freelancer'?'selected':''}}>freelance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" name="status" id="">
                                    <option value="1" {{$job->status=='1'?'selected':''}}>live</option>
                                    <option value="0"  {{$job->status=='0'?'selected':''}}>draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="last_date">Last date:</label>
                                <input type="text" name="last_date" id="datepicker" class="form-control @error('last_date') is-invalid @enderror" value="{{$job->last_date}}">
                                @if($errors->has('last_date'))
                                    <div class="error" style="color: red;">{{$errors->first('last_date')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    window.onload = function () {
        $('#datepicker').datepicker();
    }
</script>
