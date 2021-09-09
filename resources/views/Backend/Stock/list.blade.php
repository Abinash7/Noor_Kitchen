@extends('Layout.dashboard')
@section('title')
Product | List - Noor Kitchen
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Stock Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product List</h2>

                        <div class="clearfix"></div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <a href="{{route('stock.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Product</a>
                    <form action="{{route('stock.index')}}" method="GET">
                        <div class="col-md-6" style="padding-left: 0;">
                            <input type="text" class="form-control pl-0" placeholder="Search Product" name="query">
                        </div>
                        <button class="btn btn-primary" type="submit">Search</button>
                        <a class="btn btn-danger" href="{{route('stock.index')}}">Reset</a>
                    </form>
                    <div class="x_content table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>S.N</th>
                                <th>Product Name</th>
                                <th>Product Brand</th>
                                <th>Producut Quantity</th>
                                <th>Product Category</th>
                                <th>Product Rate</th>
                                <th>Damaged Item</th>
                                <th>Total Value</th>
                                <th>Add Quantity</th>                                
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($stocks as $key=>$value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->product_name}}</td>
                                    <td>{{$value->product_brand}}</td>
                                    <td>{{$value->quantity}}</td>
                                    @if($value->category_id != null)
                                    <td>{{$value->category->category_name}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    <td>{{$value->rate}}</td>
                                    <td>{{$value->damaged_piece}}</td>
                                    <td>{{($value->rate)*($value->quantity + $value->damaged_piece)}}</td>
                                    <td><a href="/admin/stock/quantity/{{$value->id}}" class="btn btn-info"><i class="fa fa-plus"></i></a></td>
                                    <td><a href="{{route('stock.edit',$value->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <form action="{{route('stock.destroy',$value->id)}}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $stocks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection