@extends('layouts.admin')

@section('content')
    <div class="col-sm-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">All Products</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Version</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products))
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img style="width:32px;height:32px" class="img-responsive" src="{{$product->icon}}" alt="No Icon">
                                    </td>
                                    <td><a href="{{route('product.show',$product->id)}}">{{$product->title}}</a></td>
                                    <td>{{$product->company}}</td>
                                    <td>{{$product->version}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
@endsection
