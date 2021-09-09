            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/admin/home" class="site_title"><i class="fa fa-cogs"></i> <span>Admin Dashboard</span></a>
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
                                <li><a href="/admin/home"><i class="fa fa-home"></i> Dashboard</a></li>
                                <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="{{route('client.index')}}"><i class="fa fa-bullseye"></i> Client Info</a></li>
                                <li><a href="{{route('stock.index')}}"><i class="fa fa-bar-chart"></i> Product Stock</a></li>
                                <li><a href="{{route('category.index')}}"><i class="fa fa-cube"></i> Category</a></li>
                                <li><a href="/admin/history"><i class="fa fa-history"></i> Daily Report</a></li>
                                <li><a href="#"><i class="fa fa-sticky-note"></i> Debit/Credit Note </a></li>
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