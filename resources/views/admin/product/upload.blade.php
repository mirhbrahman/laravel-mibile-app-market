@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Add Product Image</h4>
            </div>
            <div class="panel-body">
                @include('includes.error')

                <form action="{{route('upload')}}" method="post" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                    {{csrf_field()}}
                    <input type="hidden" name="product_id" value="{{$product_id}}">
                </form>

                <br><br>
                <a href="{{route('admin.dash')}}" class="btn btn-success">Done</a>
            </div>
        </div>


    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('js/dropzone.js')}}"></script>
@endsection
