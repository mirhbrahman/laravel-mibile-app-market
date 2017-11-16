@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Sub Cagetory</h4>
                </div>
                <div class="panel-body">
                    @include('includes.error')
                    {{Form::model($subCategory,['route'=>['sub-category.update',$subCategory->id],'method'=>'PUT'])}}
                    <label for="">Category</label>
                    {{Form::select('category_id',[''=>'Choose']+$categories,null,['required','class'=>'form-control'])}}
                    <label for="">Sub Category Name</label>
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Sub Category',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>

    </div>

@endsection
