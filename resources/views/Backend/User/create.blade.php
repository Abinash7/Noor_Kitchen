@extends('Layout.dashboard')
@section('title')
User | Add - Noor Kitchen
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Page</h3>
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
                        <h2><i class="fa fa-plus"></i> Add User</h2>

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
                            <form action="{{route('users.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter your full name" id="full_name" name="full_name">
                                    <div class="col-7">
                                        @if($errors->has('full_name'))
                                        <strong class="alert-danger">
                                            {{$errors->first('full_name')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                                    <div class="col-7">
                                        @if($errors->has('email'))
                                        <strong class="alert-danger">
                                            {{$errors->first('email')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password">
                                    <div class="col-7">
                                        @if($errors->has('password'))
                                        <strong class="alert-danger">
                                            {{$errors->first('password')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact Number:</label>
                                    <input type="text" class="form-control" placeholder="Enter your contact number" id="contact_number" name="contact_number">
                                    <div class="col-7">
                                        @if($errors->has('contact_number'))
                                        <strong class="alert-danger">
                                            {{$errors->first('contact_number')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" placeholder="Enter your Address" id="address" name="address">
                                    <div class="col-7">
                                        @if($errors->has('address'))
                                        <strong class="alert-danger">
                                            {{$errors->first('address')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vehicle">Vehicle Number:</label>
                                    <input type="text" class="form-control" placeholder="Enter your full name" id="vehicle_number" name="vehicle_number">
                                    <div class="col-7">
                                        @if($errors->has('vehicle_number'))
                                        <strong class="alert-danger">
                                            {{$errors->first('vehicle_number')}}
                                        </strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="staff">Staff Number:</label>
                                    <input type="text" class="form-control" placeholder="Enter Staff ID" id="staff_id" name="staff_id">
                                    <div class="col-7">
                                        @if($errors->has('staff_id'))
                                        <strong class="alert-danger">
                                            {{$errors->first('staff_id')}}
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