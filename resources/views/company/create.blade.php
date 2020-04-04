@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="mb-2 text-center">
                    @if(empty(Auth::user()->company->logo))
                        <img src="{{asset('avatar/man.jpg')}}" class="rounded-circle" width="100%" alt="">
                    @else
                        <img src="{{asset('uploads/logo/'.Auth::user()->company->logo)}}" class="rounded-circle"
                             width="200px" height="200px" alt="">
                    @endif
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" id="profile_change_btn" type="submit">Update Logo</button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Company Information</div>
                    <form action="{{route('company.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                       value="{{Auth::user()->company->address}}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone"
                                       value="{{Auth::user()->company->phone}}">
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red;">{{$errors->first('phone')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website"
                                       value="{{Auth::user()->company->website}}">
                                @if($errors->has('website'))
                                    <div class="error" style="color: red;">{{$errors->first('website')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan"
                                       value="{{Auth::user()->company->slogan}}">
                                @if($errors->has('slogan'))
                                    <div class="error" style="color: red;">{{$errors->first('slogan')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control">
                                {{Auth::user()->company->description}}
                                </textarea>
                                @if($errors->has('description'))
                                    <div class="error" style="color: red;">{{$errors->first('description')}}</div>
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
                    <div class="card-header">Company Information</div>
                    <div class="card-body">
                        <p>Company Name: {{Auth::user()->company->cname}}</p>
                        <p>Address: {{Auth::user()->company->address}}</p>
                        <p>Phone: {{Auth::user()->company->phone}}</p>
                        <p>Website Name: <a href="{{Auth::user()->company->website}}" style="text-decoration: none;">{{Auth::user()->company->website}}</a> </p>
                        <p>Slogan Name: {{Auth::user()->company->slogan}}</p>
                        <p>Description Name: {{Auth::user()->company->description}}</p>
                        <p>Company Page: <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                        <form action="{{route('company.uploads')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="hidden" class="custom-file-input" name="field" value="cover">
                                    <input type="file" class="custom-file-input" name="cover_photo" id="cover_photo">
                                    <label class="custom-file-label" id="cover_photo_label" for="customFile">Choose
                                        file</label>
                                </div>
                                @if($errors->has('cover_photo'))
                                    <div class="error" style="color: red;">{{$errors->first('cover_photo')}}</div>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="profileupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('company.uploads')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Choose Logo</h5>
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
                                <input type="file" class="custom-file-input" name="logo" id="logo">
                                <label class="custom-file-label" id="logo_label" for="">Choose logo</label>
                            </div>
                            @if($errors->has('logo'))
                                <div class="error" style="color: red;">{{$errors->first('logo')}}</div>
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
        $('#cover_photo').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#cover_photo_label').html(fileName);
        });
        $('#logo').change(function (e) {
            var fileName = e.target.files[0].name;
            $('#logo_label').html(fileName);
        });
        $('#profile_change_btn').on('click', function () {
            $('#profileupload').modal('show');
        });
        $('.close_modal').on('click', function () {
            $('#imgPreview').hide();
            $('#logo_label').html('');
            $('#profileupload').modal('hide');
        });
        $('#logo').change(function () {
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
