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
                                <label for="number_of_vacancy">Vacancy:</label>
                                <input type="text" name="number_of_vacancy" class="form-control @error('number_of_vacancy') is-invalid @enderror">
                                @if($errors->has('number_of_vacancy'))
                                    <div class="error" style="color: red;">
                                        {{$errors->first('number_of_vacancy')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="experience">Experience:</label>
                                <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror">
                                @if($errors->has('experience'))
                                    <div class="error" style="color: red;">
                                        {{$errors->first('experience')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender" id="">
                                    <option value="any">Any</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gender">Salary/year:</label>
                                <select class="form-control" name="salary" id="">
                                    <option value="negotiable">Negotiable</option>
                                    <option value="2000-5000">2000-5000</option>
                                    <option value="5000-10000">5000-10000</option>
                                    <option value="10000-20000">10000-20000</option>
                                    <option value="30000-50000">30000-50000</option>
                                    <option value="50000-60000">50000-60000</option>
                                    <option value="60000 plus">60000 plus</option>
                                </select>
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
