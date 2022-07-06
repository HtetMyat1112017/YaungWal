<?php

namespace App\Http\Controllers;

use App\Models\Cateogry;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use http\Client\Curl\User;
use http\Env\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function __construct()
    {
      return  $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::latest()->paginate(5);
        return view('Backend.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Cateogry::all();
        return view('Backend.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if($request->file('product_photo')){
            $file=$request->file('product_photo');
            $fileName=uniqid().'__yaungwal.'.$file->getClientOriginalExtension();
            $file->storeAs('public/product_photo',$fileName);
        }

        $product =new Product();
        $product->product_name=$request->product_name;
        $product->product_full_price=$request->product_full_price;
        $product->product_half_price=$request->product_half_price;
        $product->product_weight=$request->product_weight;
        $product->product_photo=$fileName;
        $product->product_description=$request->product_description;
        $product->category_id=$request->category_id;
        $product->user_id=$request->user_id;
        $product->save();
        return  redirect()->back()->with('toast','success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category=Cateogry::all();
        return view('Backend.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $path='public/product_photo/'.$product->product_photo;
        if(Storage::exists($path)){
            Storage::delete($path);
        }

        $file=$request->file('product_photo');
        $fileName=uniqid().'__yaungwal.'.$file->getClientOriginalExtension();
        $file->storeAs('public/product_photo',$fileName);

        $product->product_name=$request->product_name;
        $product->product_full_price=$request->product_full_price;
        $product->product_half_price=$request->product_half_price;
        $product->product_weight=$request->product_weight;
        $product->product_photo=$fileName;
        $product->product_description=$request->product_description;
        $product->category_id=$request->category_id;
        $product->update();
        return redirect()->route('product.index')->with('toast','update');
    }
    public function changeInfo(Request $request,$id){
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('toast','delete');
    }
}
