@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.left-menu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4> Hi {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4>Jobs Count: {{count(\App\Job::all())}}</h4>
                        </div>
                        <div>
                            <h4>Companies Count: {{count(\App\Company::all())}}</h4>
                        </div>
                        <div>
                            <h4>Posts Count: {{count(\App\Post::all())}}</h4>
                        </div>
                        <div>
                            <h4>Testimonials Count: {{count(\App\Testimonial::all())}}</h4>
                        </div>
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
