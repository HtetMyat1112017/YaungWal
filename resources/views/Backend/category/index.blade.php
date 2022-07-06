@extends('Backend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Category </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-12">
                <h2>All Category</h2>
                {{$category->appends(Request::all())->links() }}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Category</td>
                            <td>User</td>
                            <td>Action</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $categories)
                        <tr>
                            <td>{{$categories->id}}</td>
                            <td>{{$categories->category_name}}</td>
                            <td>{{$categories->user->name}}</td>
                            <td>
                                <form action="{{route('category.destroy',$categories->id)}}" method="post" id="del-form{{$categories->id}}">
                                    @csrf
                                    @method('delete')

                                </form>
                                <a class="btn btn-sm btn-outline-warning " href="{{route('category.edit',$categories->id)}}"><i class="feather feather-edit text-danger"></i></a>
                                <button type="submit" form="del-form{{$categories->id}}"  class="btn btn-sm btn-outline-danger"><i class="feather feather-trash text-danger"></i></button>

                            </td>
                            <td>{{$categories->created_at->format('d , M, Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
@section('jsscript')
    @if(session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: 'Delete Category is successfully'
            })
        </script>
    @endif
    @if(session('update'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'Update Category is successfully'
            })
        </script>
    @endif

@endsection

