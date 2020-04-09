@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.left-menu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Add Testimonial
                    </div>
                    <div class="card-body">
                        <form action="{{route('testimonial.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control"></textarea>
                                @if($errors->has('content'))
                                    <div class="error" style="color: red;">{{$errors->first('content')}}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                                @if($errors->has('name'))
                                    <div class="error" style="color: red;">{{$errors->first('name')}}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Profession</label>
                                <input type="text" name="profession" class="form-control">
                                @if($errors->has('profession'))
                                    <div class="error" style="color: red;">{{$errors->first('profession')}}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Video Id</label>
                                <input type="text" name="video_id" class="form-control">
                                @if($errors->has('video_id'))
                                    <div class="error" style="color: red;">{{$errors->first('video_id')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


