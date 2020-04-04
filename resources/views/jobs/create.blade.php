@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a job</div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
                    <div class="card-body">
                        <form action="{{route('job.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                @if($errors->has('title'))
                                    <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                @if($errors->has('description'))
                                    <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="roles">Role:</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror"></textarea>
                                @if($errors->has('roles'))
                                    <div class="error" style="color: red;">{{$errors->first('roles')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Category:</label>
                                <select name="category_id" class="form-control" id="">
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" name="position" class="form-control  @error('position') is-invalid @enderror">
                                @if($errors->has('position'))
                                    <div class="error" style="color: red;">{{$errors->first('position')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select class="form-control" name="type" id="">
                                    <option value="fulltime">full-time</option>
                                    <option value="parttime">part-ime</option>
                                    <option value="casual">casual</option>
                                    <option value="freelancer">freelance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" name="status" id="">
                                    <option value="1">live</option>
                                    <option value="0">draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="last_date">Last date:</label>
                                <input type="text" name="last_date" class="form-control @error('last_date') is-invalid @enderror" id="datepicker" readonly="readonly">
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
