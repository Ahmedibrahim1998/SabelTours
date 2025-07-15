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
                                <i class="fas fa-landmark"></i>
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
                                <i class="fas fa-layer-group"></i>
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
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tour-menu">
                            <div class="pull-left">
                                <i class="fas fa-compass"></i>
                                <span class="right-nav-text">{{ trans('tours_trans.tours') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="tour-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('tours.index') }}">{{ trans('tours_trans.tours') }}</a></li>
                            <li><a href="{{ route('sub-tours.index') }}">{{ trans('sub_tours_trans.sub_tours') }}</a></li>
                            <li><a href="{{ route('tour_details.index') }}">{{ trans('tour_details_trans.tour_details') }}</a></li>
                            <li><a href="{{ route('comments.index') }}">{{ trans('comments_trans.comments') }}</a></li>
                            <li><a href="{{ route('trips.index') }}">{{ trans('trips_trans.trips') }}</a></li>
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
