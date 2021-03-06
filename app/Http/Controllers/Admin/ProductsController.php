<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Photo;
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
        return view('admin.product.index')
                ->with('products', Product::all());
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
            $input['file_size'] = $file->getClientSize();
        }


        $input['slug'] = str_slug($request->title);
        $product = '';
        if ($product = Product::create($input)) {
            Session::flash('success','Product addded successfull');
        }

        //return $product;
        return redirect()->route('product.upload.image',$product->id);
    }

    public function uploadImage($id)
    {
        return view('admin.product.upload')
                ->with('product_id', $id);
    }

    public function upload(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('file')) {
            $name = $request->product_id.rand(111,999). time().'.'.$image->getClientOriginalExtension();
            $image->move('public/upload/product/image/',$name);
            $input['image'] = $name;
        }

        if (Photo::create($input)) {

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
        $product = Product::findOrFail($id);
        return view('admin.product.show',compact('product'));
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
