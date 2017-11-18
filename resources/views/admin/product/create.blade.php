@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Add New Product</h4>
            </div>
            <div class="panel-body">
                @include('includes.error')
                {{Form::open(['route'=>'product.store','method'=>'POST','files'=>true,'id'=>'upload'])}}
                <label for="">Category</label>
                {{Form::select('category_id',[''=>'Choose']+$categories,null,['class'=>'form-control','onChange'=>"get_sub_category(this.value);"])}}

                <label for="">Sub Category</label>
                <select class="form-control" name="sub_category_id" id="sub_category"></select>

                <label for="">App Title</label>
                {{Form::text('title',null,['class'=>'form-control'])}}
                <label for="">App Company</label>
                {{Form::text('company',null,['class'=>'form-control'])}}
                <label for="">App Version</label>
                {{Form::text('version',null,['class'=>'form-control'])}}
                <label for="">Requires Android Version</label>
                {{Form::text('requires_android',null,['class'=>'form-control'])}}
                <label for="">Description</label>
                {{Form::textarea('description',null,['id'=>'description','class'=>'form-control'])}}
                <label for="">App Icon</label>
                {{Form::file('icon',null,['class'=>'form-control'])}}
                <label for="">App Apk File</label>
                {{Form::file('file',null,['class'=>'form-control'])}}
                <div class="col-sm-12" style="padding:0">
                    <br>
                    <progress  id="prog" style="display:none;width:100%;background-color:green"  value="0" max="100"></progress>
                    <div class="" id="here">
                    </div>
                    <br>
                </div>
                <br>
                {{Form::submit('Add Product',['class'=>'btn btn-info'])}}
                {{Form::close()}}


            </div>
        </div>


    </div>

@endsection
@section('scripts')
    @include('includes.autoJs')
    @include('includes.summernoteJs')
    {{--@include('includes.fileUploadJs')
     <script type="text/javascript" src="{{asset('js/dropzone.js')}}"></script> --}}
@endsection
