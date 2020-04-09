@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-3">
                @include('admin.left-menu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                @if($errors->has('title'))
                                    <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control">
                                    {{$post->content}}
                                </textarea>
                                @if($errors->has('content'))
                                    <div class="error" style="color: red;">{{$errors->first('content')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <img class="img-thumbnail m-3" src="{{asset('storage/'.$post->image)}}" alt=""
                                     width="100">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" id="image_label" for="">Choose file</label>
                                </div>
                                @if($errors->has('image'))
                                    <div class="error" style="color: red;">{{$errors->first('image')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1" {{$post->status == '1'? 'selected' : ''}}>Live</option>
                                    <option value="0" {{$post->status == '0'? 'selected' : ''}}>Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
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
        $('#image').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#image_label').html(fileName);
        });
    }
</script>
