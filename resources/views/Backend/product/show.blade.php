@extends('Backend.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Product</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-md-6">
                <div class="">
                    <img src="{{asset('storage/product_photo/'.$product->product_photo)}}" class="w-75" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="">
                    <h2>{{$product->product_name}}</h2>
                    <small>Type :{{$product->Category->category_name}}</small>

                    <p class="fw-bolder mt-3">Description :</p>
                    <small class="mb-4">{{$product->product_description}}</small>
                    <p >Price : {{floor($product->product_full_price)}} Ks</p>
                    <div class="d-flex mb-3">
                        <button class="btn btn-sm btn-outline-primary me-2" id="addBtn"><i class="feather-plus"></i></button>
                        <input type="number" class="form-control w-25" value="1" id="increase_box" min="1">
                        <button class="btn btn-sm btn-outline-primary ms-2" id="minusBtn"><i class="feather-minus"></i></button>
                    </div>
                    <div class="">
                        <button class="btn btn-primary"> Add To Cart</button>
                        <button class="btn btn-outline-primary"><i class="feather-heart"></i> Wish List</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsscript')
    <script>


       let box=document.getElementById('increase_box');
       //-------------- increase input value-------------//
       document.getElementById('addBtn').addEventListener("click", ()=>{
         box.value++;
       });
       //-------------- decrease input value--------------//
       document.getElementById('minusBtn').addEventListener("click", ()=>{
           if(box.value>1){
               box.value--;
           }

       });


    </script>
@endsection
