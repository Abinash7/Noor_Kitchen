@extends('Layout.dashboard')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <!-- <div class="title_left">
                <h3>Daily Report</h3>
            </div> -->

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
                        <h2>Individual Sale Detail</h2>

                        <div class="clearfix"></div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <div class="x_content table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <th>S.N</th>
                                <th>Product ID</th>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Sold Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($details as $key=>$sale)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$sale->product_id}}</td>
                                    <td>{{$sale->sale->customer_name}}</td>
                                    <td>{{$sale->product_name}}</td>
                                    <td>{{$sale->product_price}}</td>
                                    <td>{{$sale->quantity}}</td>
                                    <td>{{$sale->product_price * $sale->quantity}}</td>
                                    <td>{{$sale->created_at}}</td>
                                    <td><a href="/admin/report/edit/{{$sale->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td>
                                    <td>
                                        <form action="/admin/report/delete/{{$sale->id}}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection