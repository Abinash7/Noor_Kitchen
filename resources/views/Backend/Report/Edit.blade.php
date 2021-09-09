@extends('Layout.dashboard')
@section('title')
Report | Edit - Noor Kitchen
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Report Page</h3>
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
                        <h2><i class="fa fa-pencil"></i> Edit Category</h2>

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
                            <form action="/admin/report/update/{{$sales->id}}" method="POST">
                                @csrf
                                @method('Put')
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" value="{{$sales->quantity}}">
                                    <div class="col-7">
                                        @if($errors->has('quantity'))
                                        <strong class="alert-danger">
                                            {{$errors->first('quantity')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-wrench"></i> Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection