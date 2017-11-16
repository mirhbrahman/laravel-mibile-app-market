@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Cagetory</h4>
                </div>
                <div class="panel-body">
                    @include('includes.error')
                    {{Form::model($category,['route'=>['category.update',$category->id],'method'=>'PUT'])}}
                    <label for="">Category Name</label>
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Category',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>

    </div>

@endsection
