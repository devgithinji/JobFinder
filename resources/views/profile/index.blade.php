@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="mb-2 text-center">
                    @if(empty(Auth::user()->profile->avatar))
                        <img src="{{asset('avatar/man.jpg')}}" class="rounded-circle" width="100px" alt="">
                    @else
                        <img src="{{asset('uploads/avatar/'.Auth::user()->profile->avatar)}}" class="rounded-circle"
                             width="200px" height="200px" alt="">
                    @endif
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" id="profile_change_btn" type="submit">Update Profile Photo</button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Profile</div>
                    <form action="{{route('profile.create')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                       value="{{Auth::user()->profile->address}}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                       value="{{Auth::user()->profile->phone_number}}">
                                @if($errors->has('phone_number'))
                                    <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Experience</label>
                                <textarea name="experience" class="form-control">
                                    {{Auth::user()->profile->experience}}
                                </textarea>
                                @if($errors->has('experience'))
                                    <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Bio</label>
                                <textarea name="bio" class="form-control">
                                    {{Auth::user()->profile->bio}}
                                </textarea>
                                @if($errors->has('bio'))
                                    <div class="error" style="color: red;">{{$errors->first('bio')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <p>Name: {{Auth::user()->name}}</p>
                        <p>Email: {{Auth::user()->email}}</p>
                        <p>Address: {{Auth::user()->profile->address}}</p>
                        <p>Phone Number: {{Auth::user()->profile->phone_number}}</p>
                        <p>Gender: {{Auth::user()->profile->gender}}</p>
                        <p>Experience: {{Auth::user()->profile->experience}}</p>
                        <p>Bio: {{Auth::user()->profile->bio}}</p>
                        <p>Member Since: {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}"
                                  style="text-decoration: none;">Cover Letter</a></p>
                        @else
                            <p>Please upload cover letter</p>
                        @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p><a href="{{Storage::url(Auth::user()->profile->resume)}}" style="text-decoration: none;">Resume</a>
                            </p>
                        @else
                            <p>Please upload resume</p>
                        @endif
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                        <form action="{{route('cover.uploads')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="hidden" class="custom-file-input" name="field" value="cover">
                                    <input type="file" class="custom-file-input" name="cover_letter" id="cover_letter">
                                    <label class="custom-file-label" id="cover_letter_label" for="customFile">Choose
                                        file</label>
                                </div>
                                @if($errors->has('cover_letter'))
                                    <div class="error" style="color: red;">{{$errors->first('cover_letter')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">
                        <form action="{{route('cover.uploads')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="hidden" class="custom-file-input" name="field" value="resume">
                                    <input type="file" class="custom-file-input" name="resume" id="resume">
                                    <label class="custom-file-label" id="resume_label" for="">Choose file</label>
                                </div>
                                @if($errors->has('resume'))
                                    <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="profileupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Choose Profile Picture</h5>
                        <button type="button" class="close close_modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center m-3">
                            <img src="#" id="imgPreview" class="img-thumbnail" alt="" width="100%">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                <label class="custom-file-label" id="avatar_label" for="">Choose avatar</label>
                            </div>
                            @if($errors->has('avatar'))
                                <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_modal">Close</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    window.onload = function () {
        $('#cover_letter').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#cover_letter_label').html(fileName);
        });
        $('#resume').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#resume_label').html(fileName);
        });
        $('#avatar').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#avatar_label').html(fileName);
        });
        $('#profile_change_btn').on('click', function () {
            $('#profileupload').modal('show');
        });
        $('.close_modal').on('click', function () {
            $('#imgPreview').hide();
            $('#avatar_label').html('');
            $('#profileupload').modal('hide');
        });
        $('#avatar').change(function () {
            renderPreviewImg(this);
        });

        $('#imgPreview').hide();

        function renderPreviewImg(input) {
            $('#imgPreview').show();

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgPreview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
</script>
