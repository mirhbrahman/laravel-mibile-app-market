@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add New Sub Cagetory</h4>
                </div>
                <div class="panel-body">
                    @include('includes.error')
                    {{Form::open(['route'=>'sub-category.store','method'=>'POST'])}}
                    <label for="">Category</label>
                    {{Form::select('category_id',[''=>'Choose']+$categories,0,['required','class'=>'form-control'])}}
                    <label for="">Sub Category Name</label>
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add Sub Category',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Sub Categories</h4>
                </div>
                <div class="panel-body">
                    <table class="table datatable">
                        <thead>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (count($subCategories))
                                @foreach ($subCategories as $subCategory)
                                    <tr>
                                        <td>{{$subCategory->category->name}}</td>
                                        <td>{{$subCategory->name}}</td>
                                        <td>
                                            <a href="{{route('sub-category.edit',$subCategory->id)}}" class="btn btn-sm btn-info pull-left">Edit</a>

                                            {{Form::open(['route'=>['sub-category.destroy',$subCategory->id],'method'=>'DELETE'])}}
                                            {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger pull-right', "onclick" => "return confirm('Are you sure you want to delete this item?');"])}}
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">No data found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
@endsection
