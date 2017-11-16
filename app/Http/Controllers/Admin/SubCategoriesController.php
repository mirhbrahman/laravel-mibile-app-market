<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Session;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subCategory.index')
        ->with('subCategories',SubCategory::all())
        ->with('categories', Category::pluck('name','id')->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required|numeric',
            'name' => 'required|min:2|max:100|unique:sub_categories',
        ]);

        if (SubCategory::create($request->all())) {
            Session::flash('success','Sub Category create successfull.');
        }

        return redirect()->back();
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
        return view('admin.subCategory.edit')
            ->with('subCategory',SubCategory::find($id))
            ->with('categories', Category::pluck('name','id')->all());
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
        $this->validate($request,[
            'category_id' => 'required|numeric',
            'name' => 'required|min:2|max:100|unique:sub_categories,id,'.$id,
        ]);

        $subCategory = SubCategory::findOrFail($id);

        if ($subCategory->update($request->all())) {
            Session::flash('success','Sub Category update successfull.');
        }

        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        if ($subCategory->delete()) {
            Session::flash('success','Sub Category delete successfull.');
        }

        return redirect()->route('sub-category.index');
    }
}
