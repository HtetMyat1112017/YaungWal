<?php

namespace App\Http\Controllers;

use App\Models\Cateogry;
use App\Http\Requests\StoreCateogryRequest;
use App\Http\Requests\UpdateCateogryRequest;

class CateogryController extends Controller
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
        $category=Cateogry::latest()->paginate(5);
        return view('Backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCateogryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCateogryRequest $request)
    {
        $validated = $request->validate([
           'category_name'=>'required|unique:cateogries|min:2|max:40',
            'user_id'=>'required'
        ]);

        $category=new Cateogry();
        $category->category_name=$request->category_name;
        $category->user_id=$request->user_id;
        $category->save();
        return redirect()->back()->with('success',"Category is created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cateogry  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Cateogry $cateogry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cateogry  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Cateogry::find($id);
        return view('Backend.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCateogryRequest  $request
     * @param  \App\Models\Cateogry  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCateogryRequest $request, $id)
    {
        $validated = $request->validate([
            'category_name'=>'required|unique:cateogries|min:2|max:40',

        ]);
        $category=Cateogry::find($id);
        $category->category_name=$request->category_name;
        $category->update();
        return redirect()->route('category.index')->with('update',$category->category_name ." is created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cateogry  $cateogry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Cateogry::find($id);
        $category->delete();
        return redirect()->back()->with('success','succesuly');
    }
}
