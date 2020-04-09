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
                        Add Post
                    </div>
                    <div class="card-body">
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                                @if($errors->has('title'))
                                    <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control"></textarea>
                                @if($errors->has('content'))
                                    <div class="error" style="color: red;">{{$errors->first('content')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
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
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
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

<script>
window.onload = function () {
    $('#image').change(function (e) {
        var fileName = e.target.files[0].name;
        $('#image_label').html(fileName);
    });
}
</script>
