@extends('layouts.main')
@section('content')
    <div>
        <div style="height: 113px;"></div>

        <div class="unit-5 overlay" style="background-image: url('{{asset('external/images/hero_1.jpg')}}');">
            <div class="container text-center">
                <h2 class="mb-0">Contact</h2>
                <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>Contact</span></p>
            </div>
        </div>


        <div class="site-section bg-light">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-lg-8 mb-5">

                        <div class="my-2">
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>


                        <form action="{{route('create.message')}}" class="p-5 bg-white" method="post">
                            @csrf

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="fullname">Full Name</label>
                                    <input type="text" id="name"
                                           name="name"
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                           placeholder="Full Name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="email">Email</label>
                                    <input type="email" id="email"
                                           name="email"
                                           class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                           placeholder="Email Address">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Phone</label>
                                    <input type="text" id="phone"
                                           name="phone"
                                           class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}"
                                           placeholder="Phone #">
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="font-weight-bold" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5"
                                              class="form-control {{$errors->has('message') ? 'is-invalid' : ''}}"
                                              placeholder="Say hello to us"></textarea>
                                    @if($errors->has('message'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('message')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                                </div>
                            </div>


                        </form>
                    </div>

                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Contact Info</h3>
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="#">youremail@domain.com</a></p>

                        </div>

                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia
                                architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur?
                                Fugiat quaerat eos qui, libero neque sed nulla.</p>
                            <p><a href="#" class="btn btn-primary px-4 py-2 text-white pill">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5 quick-contact-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <h2><span class="icon-room"></span> Location</h2>
                            <p class="mb-0">New York - 2398 <br> 10 Hadson Carl Street</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h2><span class="icon-clock-o"></span> Service Times</h2>
                            <p class="mb-0">Wednesdays at 6:30PM - 7:30PM <br>
                                Fridays at Sunset - 7:30PM <br>
                                Saturdays at 8:00AM - Sunset</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2><span class="icon-comments"></span> Get In Touch</h2>
                        <p class="mb-0">Email: info@yoursite.com <br>
                            Phone: (123) 3240-345-9348 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


