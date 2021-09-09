@extends('Layout.staffdashboard')
@section('title')
Invoice | Individual - Noor Kitchen
@endsection
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
                        <h2>Daily Report</h2>

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
                                <th>Invoice Number</th>
                                <th>Client Name</th>
                                <th>Client Number</th>
                                <th>Vehicle Number</th>
                                <th>Total Amount</th>
                                <th>Received Amount</th>
                                <th>Change Amount</th>
                                <th>Payment Status</th>
                                <th>Print Receipt</th>
                            </thead>
                            <tbody>
                                @foreach($sales as $key=>$sale)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$sale->id}}</td>
                                    <td>{{$sale->customer_name}}</td>
                                    <td>{{$sale->customer_number}}</td>
                                    <td>{{$sale->vehicle_number}}</td>
                                    <td>{{$sale->total_price}}</td>
                                    <td>{{$sale->total_received}}</td>
                                    <td>{{$sale->change}}</td>
                                    <td>{{$sale->sale_status}}</td>
                                    <td><a href="/admin/cashier/showReceipt/{{$sale->id}}" class="btn btn-warning"><i class="fa fa-print"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $sales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection