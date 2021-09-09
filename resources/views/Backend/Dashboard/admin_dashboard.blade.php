@extends('Layout.dashboard')
@section('title')
Admin | Dashboard - Noor Kitchen
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3>
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
                    <div class="home__features row">
                        <div class="col-md-3 col-sm-3">
                            <a href="/admin/stock">
                                <img src="{{asset('Icons/inventory.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">Product</h3>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a href="/admin/users">
                                <img src="{{asset('Icons/crowd.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">User</h3>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a href="/admin/category">
                                <img src="{{asset('Icons/menu.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">Category</h3>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a href="/admin/report">
                                <img src="{{asset('Icons/report.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">Report</h3>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a href="/cashier">
                                <img src="{{asset('Icons/cashier.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">Cashier</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection