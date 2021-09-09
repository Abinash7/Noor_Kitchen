@extends('Layout.dashboard')
@section('title')
Product | Add Quantity - Noor Kitchen
@endsection
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
                        <h2><i class="fa fa-plus"></i> Add Quantity</h2>

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
                            <form action="/admin/stock/quantity/{{$stocks->id}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter Product Quantity">
                                    <div class="col-7">
                                        @if($errors->has('quantity'))
                                        <strong class="alert-danger">
                                            {{$errors->first('quantity')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate:</label>
                                    <input type="number" id="rate" name="rate" class="form-control" placeholder="Enter Product Rate" value="{{$stocks->rate}}">
                                    <div class="col-7">
                                        @if($errors->has('rate'))
                                        <strong class="alert-danger">
                                            {{$errors->first('rate')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="damaged_piece">Damage Number:</label>
                                    <input type="number" id="damaged_piece" name="damaged_piece" class="form-control" placeholder="Enter Total Damage Number">
                                    <div class="col-7">
                                        @if($errors->has('damaged_piece'))
                                        <strong class="alert-danger">
                                            {{$errors->first('damaged_piece')}}
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