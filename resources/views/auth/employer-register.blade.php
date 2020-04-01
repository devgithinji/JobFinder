@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employer Registration') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('emp.register') }}">
                            @csrf

                            <input type="hidden" value="employer" name="user_type">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company name') }}</label>

                                <div class="col-md-6">
                                    <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}" required autocomplete="name" autofocus>

                                    @error('cname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-eye"></i></div>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-eye"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
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
        $('.fa').on('click',function () {
            var icon =  $('.fa');
            var pwd = $('#password');
            var confirm_pwd = $('#password-confirm');
           if (pwd.attr("type") ==="password") {
               icon .removeClass('fa-eye');
               icon .addClass('fa-eye-slash');
               pwd.attr("type","text");
               confirm_pwd.attr("type","text");
           }else{
               pwd.attr("type","password");
               confirm_pwd.attr("type","password");
               icon .removeClass('fa-eye-slash');
               icon .addClass('fa-eye');
           }
        });
    };
</script>
