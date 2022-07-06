@extends('Backend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Product</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <h2>Product List</h2>
            </div>
            <div class="col-12">
                <table class="table table-hover table-responsive table-bordered ">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Product Name</td>
                            <td>Photo</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Weight </td>
                            <td>Description </td>
                            <td>Action</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                        <tr>
                            <td>{{$products->id}}</td>
                            <td>{{$products->product_name}}</td>
                            <td>
                                <img src="{{asset('storage/product_photo/'.$products->product_photo)}}" class="" width="30px"  alt="">
                            </td>
                            <td>{{$products->product_full_price}}</td>
                            <td>{{$products->Category->category_name}}</td>
                            <td>{{$products->product_weight}}</td>
                            <td>{{substr($products->product_description,0,10)}}...</td>
                            <td>
                                <form action="{{route('product.destroy',$products->id)}}" method="post" id="del-form{{$products->id}}">
                                    @csrf
                                    @method('delete')

                                </form>
                                <a href="{{route('product.show',$products->id)}}"  class="btn btn-sm btn-outline-primary" title="detail"><i class="feather-info"></i></a>
                                <a class="btn btn-sm btn-outline-warning " href="{{route('product.edit',$products->id)}}" title="update"><i class="feather feather-edit text-danger"></i></a>
                                <button type="submit" form="del-form{{$products->id}}"  class="btn btn-sm btn-outline-danger" title="delete"><i class="feather feather-trash text-danger"></i></button>
                            </td>
                            <td>{{$products->created_at->format('d , M, Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
