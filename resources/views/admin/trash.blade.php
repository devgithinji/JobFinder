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
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td><img src="{{asset('storage/'.$post->image)}}" alt="" width="80"></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{str_limit($post->content,20)}}</td>
                                    <td>
                                        @if($post->status == 1)
                                            <a href="" class="badge badge-success"> Live</a>
                                        @else
                                            <a href="" class="badge badge-danger">Draft</a>
                                        @endif
                                    </td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="text-center">
                                            <button id="deleteBtn" class="btn-sm btn-danger" onclick="showDeleteModal()">Restore
                                            </button>
                                            <form id="postRestore" action="{{route('post.restore',[$post->id])}}">
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$posts->links()}}
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
            text: "You want to restore this post",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
            if (result.value) {
                $('#postRestore').submit();
                swal.fire(
                    'Deleted!',
                    'Your file has been restored.',
                    'success'
                )
            }
        })
    }


</script>
