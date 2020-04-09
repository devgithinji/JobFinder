@extends('layouts.main')
@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row" id="app">
                <div class="title my-3">
                    <h2 class="text-muted"><strong>{{$post->title}}</strong></h2>

                </div>

                <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" style="width: 100%;">

                <div class="col-lg-8">
                    <div class="p-4 mb-8 bg-white">
                        <h5 class="h5 text-black mb-3">Created By: Admin &nbsp;
                        {{date('d-m-Y',strtotime($post->cteated_at))}}
                        </h5>
                        <p>{{$post->content}}</p>
                    </div>


                </div>


                <div class="col-md-4 p-4 site-section bg-light">

                </div>
            </div>
            <br>
            <br>
            <br>

        </div>
    </div>
@endsection






