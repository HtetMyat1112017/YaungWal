@extends('Backend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                    </ol>
                </nav>
            </div>
            <hr class="text-black-50">
            <div class="col-12">
                <div class="header-product">
                    <h2>Update Product </h2>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-6">
                <div class="">
                    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" class="form-control  @error('product_name') is-invalid  @enderror" name="product_name" placeholder="Enter a something" value="{{$product->product_name}}">
                                @error('product_name')  <small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Product Photo</label>
                                <input type="file" class="form-control  @error('product_photo') is-invalid @enderror" name="product_photo" value="{{$product->product_photo}}">
                                @error('product_photo')  <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Product Half Price</label>
                                <input type="number" class="form-control  @error('product_full_price') is-invalid @enderror" name="product_full_price"  placeholder="Enter a something" value="{{$product->product_full_price}}" >
                                @error('product_full_price') <small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="" class="form-label">Product Full Price</label>
                                <input type="number" class="form-control  @error('product_half_price') is-invalid @enderror" name="product_half_price"  placeholder="Enter a something"  value="{{$product->product_half_price}}">
                                @error('product_half_price') <small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Product Category</label>
                                <select name="category_id" class="form-select  @error('category_id')  is-invalid @enderror" id="" >
                                    <option value="">Select Category</option>
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}" {{$categories->id==$product->Category->id ? "selected" : " "}}>{{$categories->category_name}}</option>

                                    @endforeach
                                </select>
                                @error('category_id')  <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Product Weight</label>
                                <input type="number" class="form-control  @error('product_weight')  is-invalid  @enderror" name="product_weight" value="{{$product->product_weight}}"   placeholder="Enter a g or kg" >
                                @error('product_weight') <small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Product Description</label>
                                <textarea name="product_description"  class="form-control   @error('product_description') is-invalid @enderror" id=""  cols="20" rows="5">{{$product->product_description}}</textarea>
                                @error('product_description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div >
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsscript')
    @if(session('toast'))
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
                title: 'Create Product is successfully'
            })
        </script>
    @endif
@endsection
