@extends('Layout.staffdashboard')
@section('title')
Staff | Dashboard - Noor Kitchen
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
                            <a href="/cashier">
                                <img src="{{asset('Icons/cashier.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">Cashier</h3>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a href="/staff/report/individual">
                                <img src="{{asset('Icons/report.svg')}}" alt="Features Icon 1" class="home__features home__features-image feature-image-1 img-thumbnail" />
                                <h3 class="home__features feature-title">Report</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection