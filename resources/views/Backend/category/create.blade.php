@extends('Backend.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <hr class="text-black-50">
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="mb-3">Create Category</h2>

                <!----   category create input box       -->
                <form action="{{route('category.store')}}" id="category" method="post">
                    @csrf
                    <div class="d-flex align-items-end ">
                       <div class="">
                           <label for="" class="form-label">Add Category</label>
                           <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror">
                           @error('category_name')
                           <small class="text-danger">{{$message}}</small>
                           @enderror
                           <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                       </div>
                        <button class="btn btn-primary ms-3 px-3 category-btn">Create</button>
                    </div>
                </form>
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
                icon: 'success',
                title: 'Create Category is successfully'
            })
        </script>
    @endif
@endsection

