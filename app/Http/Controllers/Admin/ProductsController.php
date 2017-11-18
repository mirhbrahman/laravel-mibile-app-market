<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Session;
use Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create')
        ->with('categories', Category::pluck('name','id')->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //........NEED VALIDATION
        $input = $request->all();
        //..........optimized icon image
        if ($image = $request->file('icon')) {
            $rand = substr(md5(microtime()),rand(0,26),60);
            $newName = time().$rand.'.'.$image->getClientOriginalExtension();

            // $path = public_path('upload/product/icon');
            // $image->move($path,$newName);

            $path = public_path('upload/product/icon/'.$newName);
            //......resize image
            $image = Image::make($image);
            $image->resize(144,144);
            $image->save($path);

            //.......make 64X64image
            $path = public_path('upload/product/icon_64x64/'.$newName);
            $image = Image::make($image);
            $image->resize(64,64);
            $image->save($path);

            $input['icon'] = $newName;
        }

        if ($file = $request->file('file')) {
            $rand = substr(md5(microtime()),rand(0,26),60);
            $newName = time().$rand.'.'.$file->getClientOriginalExtension();
            $file->move('public/upload/product/file/',$newName);

            $input['file'] = $newName;
        }


        $input['slug'] = str_slug($request->title);

        if (Product::create($input)) {
            Session::flash('success','Product addded successfull');
        }

        return redirect()->route('product.create');
    }

    public function upload(Request $request)
    {
        if ($image = $request->file('file')) {
            $name = rand(111,999). time().'.'.$image->getClientOriginalExtension();
            $image->move('haha',$name);
        }


        return redirect()->route('product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
