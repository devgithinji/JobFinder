@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                @include('admin.left-menu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Menu
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Content</th>
                                <th scope="col">Name</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Video_id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>{{str_limit($testimonial->content,20)}}</td>
                                    <td>{{$testimonial->name}}</td>
                                    <td>{{$testimonial->profession}}</td>
                                    <td>{{$testimonial->video_id}}</td>
                                    <td>{{$testimonial->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('testimonial.edit',[$testimonial->id])}}">
                                                <button class="btn-sm btn-success mb-1">Edit</button>
                                            </a>
                                            <button id="deleteBtn" class="btn-sm btn-danger" onclick="showDeleteModal()">Delete</button>
                                            <form id="testimonialDestroy" action="{{route('testimonial.delete',[$testimonial->id])}}"
                                                  method="POST">
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$testimonials->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




<script type="text/javascript">


    function showDeleteModal() {
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $('#testimonialDestroy').submit();
                swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }


</script>
