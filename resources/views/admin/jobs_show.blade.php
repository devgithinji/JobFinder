@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-2">
                @include('admin.left-menu')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        All Jobs
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Job Title</th>
                                <th scope="col">Job Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Position</th>
                                <th scope="col">Address</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>{{str_limit($job->title,20)}}</td>
                                    <td>{{str_limit($job->description,20)}}</td>
                                    <td>{{$job->category_id}}</td>
                                    <td>
                                        @if($job->status == 1)
                                            <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-success"> Live</a>
                                        @else
                                            <a href="{{route('job.toggle',[$job->id])}}" class="badge badge-primary">Draft</a>
                                        @endif
                                    </td>
                                    <td>{{str_limit($job->position,10)}}</td>
                                    <td>{{str_limit($job->address,10)}}</td>
                                    <td>{{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                                <button class="btn-sm btn-success mb-1">View</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$jobs->links()}}
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
                $('#postDestroy').submit();
                swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }


</script>
