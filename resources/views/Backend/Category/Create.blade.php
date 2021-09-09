@extends('Layout.dashboard')
@section('title')
Category | Add - Noor Kitchen
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
                        <h2><i class="fa fa-plus"></i> Add Category</h2>

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
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Category Name:</label>
                                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter Category Name">
                                    <div class="col-7">
                                        @if($errors->has('category_name'))
                                        <strong class="alert-danger">
                                            {{$errors->first('category_name')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection