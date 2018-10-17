@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><a href="{{route('product.index')}}">Products</a> / {{$product->title}}</h4>
            </div>
            <div class="panel-body">

                <div class="col-sm-12">
                    <div class="pull-left">
                        <img style="width:32px;height:32px" class="img-responsive" src="{{$product->icon}}" alt="No Icon">
                    </div>
                    <div class="pull-left">
                        <h3 style="padding-top:5px;margin-left:10px">{{$product->title}}</h3>
                    </div>
                    <br><br>
                </div>
            <table class="table">
                @if ($product)
                    <tr>
                        <td>Category</td>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <td>Sup Category</td>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{$product->title}}</td>
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td>{{$product->company}}</td>
                    </tr>
                    <tr>
                        <td>Version</td>
                        <td>{{$product->version}}</td>
                    </tr>
                    <tr>
                        <td>Requires Android Version</td>
                        <td>{{$product->requires_android}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{!!$product->description!!}</td>
                    </tr>
                    <tr>
                        <td>File Size</td>
                        <td>{{formatSizeUnits($product->file_size)}}</td>
                    </tr>
                @endif
            </table>

            <h4>Images</h4>
            <hr>
            <table>
                @if ($product->images)
                    <div class="col-sm-12">
                        @foreach ($product->images as $image)
                            <div class="col-sm-3">
                                <img style="width:200px;height:300px" class="img-responsive" src="{{$image->image}}" alt="No Icon">
                            </div>
                        @endforeach
                    </div>
                    @else
                        <p>No image found!!!</p>
                @endif
            </table>

            </div>
        </div>
    </div>

@endsection
