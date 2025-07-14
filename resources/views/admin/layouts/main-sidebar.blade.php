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
                            <li><a href="{{route('places.index')}}">{{ trans('places_trans.places') }}</a></li>
                            <li><a href="{{route('place-details.index')}}">{{ trans('places_trans.place_details') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sec-menu">
                            <div class="pull-left">
                                <i class="fas fa-users"></i>
                                <span class="right-nav-text">{{ trans('sections_trans.sections') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sec-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('sections.index') }}">{{ trans('sections_trans.sections') }}</a></li>
                            <li><a href="{{ route('section-details.index') }}">{{ trans('section_details_trans.section_details') }}</a></li>
                            <li><a href="{{ route('books.index') }}">{{ trans('books_trans.books') }}</a></li>
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
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contacts-menu">
                            <div class="pull-left">
                                <i class="fas fa-phone"></i>
                                <span class="right-nav-text">{{ trans('contacts_trans.contacts') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contacts-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('contacts.index') }}">{{ trans('contacts_trans.contacts') }}</a></li>
                            <li><a href="{{ route('about-us.index') }}">{{ trans('about_us_trans.about_us') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================-->
