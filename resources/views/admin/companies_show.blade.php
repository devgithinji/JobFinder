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
                        All Companies
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Website</th>
                                <th scope="col">Address</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->cname}}</td>
                                    <td><img src="{{asset('uploads/logo/'.$company->logo)}}" alt="" width="80"></td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->website}}</td>
                                    <td>{{str_limit($company->address,10)}}</td>
                                    <td>{{$company->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('company.index',[$company->id,$company->slug])}}">
                                                <button class="btn-sm btn-success mb-1">View</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$companies->links()}}
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
