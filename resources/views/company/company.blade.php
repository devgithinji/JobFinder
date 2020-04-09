@extends('layouts.main')
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Companies list</h2>
                </div>
            </div>
            <div class="row">
                @foreach($companies as $company)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="h-100 feature-item">
                            <span>
                                @if(empty($company->logo))
                                    <img src="{{asset('avatar/man.jpg')}}" width="100" alt="">
                                @else
                                    <img src="{{asset('uploads/logo/'.$company->logo)}}" width="100" alt="">
                                @endif
                            </span>
                            <h2 class="m-3">{{$company->cname}}</h2>
                            <span class="counting">view company</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 text-center mt-5">
                {{$companies->appends(\Illuminate\Support\Facades\Input::except('page'))->links()}}
            </div>
        </div>
    </div>
@endsection


