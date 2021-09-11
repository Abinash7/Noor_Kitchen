@extends('Layout.dashboard')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Client Page</h3>
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
                        <h2><i class="fa fa-plus"></i> Add Client</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                        <div class="container">
                            <form action="{{route('client.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="client_name">Client Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter Client Name" id="client_name" name="client_name">
                                    <div class="col-7">
                                        @if($errors->has('client_name'))
                                        <strong class="alert-danger">
                                            {{$errors->first('client_name')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="client_address">Client Address:</label>
                                    <input type="text" id="client_adderss" name="client_address" class="form-control" placeholder="Enter Client Address">
                                    <div class="col-7">
                                        @if($errors->has('client_address'))
                                        <strong class="alert-danger">
                                            {{$errors->first('client_address')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number:</label>
                                    <input type="number" id="contact_number" name="contact_number" class="form-control" placeholder="Enter Client Contact Number">
                                    <div class="col-7">
                                        @if($errors->has('contact_number'))
                                        <strong class="alert-danger">
                                            {{$errors->first('contact_number')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customer_vat">VAT Number:</label>
                                    <input type="number" id="customer_vat" name="customer_vat" class="form-control" placeholder="Enter Client VAT Number">
                                    <div class="col-7">
                                        @if($errors->has('customer_vat'))
                                        <strong class="alert-danger">
                                            {{$errors->first('customer_vat')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection