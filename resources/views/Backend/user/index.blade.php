@extends('Backend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All User</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <h2>User List</h2>
            </div>
            <div class="col-12">
                <table class="table table-hover table-responsive table-bordered ">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Photo</td>
                        <td>Email</td>
                        <td>Row</td>
                        <td>Action</td>
                        <td>Date</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name}}</td>
                            <td>
                                <img src="{{!asset('storage/user_photo/'.$users->user_photo) ?  asset('storage/user_photo/'.$users->user_photo): asset('photo/user_default.png') }}" class="" width="30px"  alt="">
                            </td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->user_row}}</td>

                            <td>
                                <form action="{{route('user.destroy',$users->id)}}" method="post" id="del-form{{$users->id}}">
                                    @csrf
                                    @method('delete')

                                </form>
                                <button type="submit" form="del-form{{$users->id}}"  class="btn btn-sm btn-outline-danger" title="delete"><i class="feather feather-trash text-danger"></i></button>
                            </td>
                            <td>{{$users->created_at->format('d , M, Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
