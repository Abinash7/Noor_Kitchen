<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/staff/home" class="site_title"><i class="fa fa-cogs"></i> <span>Staff Dashboard</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('Icons/profile.svg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{auth()->user()->full_name}}</h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="/staff/home"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a href="/cashier"><i class="fa fa-money"></i> Cashier</a></li>
                    <li><a href="/staff/report/individual"><i class="fa fa-sticky-note"></i> Daily Report</a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">

        </div>
        <!-- /menu footer buttons -->
    </div>
</div>