<div class="container-fluid">
    <div class="row">

        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="#"><i class="fas fa-home"></i><span
                                class="right-nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-drivers-license"></i><span
                                class="right-nav-text">Home</span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#governmate-menu">
                            <div class="pull-left">
                                <i class="fas fa-users"></i>
                                <span class="right-nav-text">{{ trans('governorates_trans.governorates') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="governmate-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('governorates.index')}}">{{ trans('governorates_trans.governorates') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#client-menu">
                            <div class="pull-left">
                                <i class="fas fa-users"></i>
                                <span class="right-nav-text">{{ trans('clients_trans.clients') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="client-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('clients.index') }}">{{ trans('clients_trans.clients') }}</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="fa fa-users"></i><span
                                    class="right-nav-text">User</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="#">User</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================-->
