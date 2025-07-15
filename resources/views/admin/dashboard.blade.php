<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Dashboard </title>

    @include('admin.layouts.head')
</head>
<body @if (App::getLocale() == 'ar') style="font-family: 'Cairo', sans-serif;"
      @else style="font-family: 'Tinos', serif;" @endif>

<div class="wrapper">

    <!--================================= preloader -->

    {{--    <div id="pre-loader">--}}
    {{--        <img src="{{ env('APP_URL') }}/public/images/pre-loader/loader-01.svg" alt="">--}}
    {{--    </div>--}}

    <!--=================================
preloader -->

    @include('admin.layouts.main-header')

    @include('admin.layouts.main-sidebar')

    <!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">Dashboard</h4><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('clients.index') }}">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="float-right text-right">
                                    <p class="card-text text-dark font-weight-bold">{{ __('clients_trans.clients') }}</p>
                                    <h4>{{\App\Models\Client::count()}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('governorates.index') }}">

                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-landmark highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark font-weight-bold">{{ trans('governorates_trans.governorates') }}</p>
                                    <h4>{{\App\Models\Governorate::count()}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('comments.index') }}">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-comments highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('comments_trans.comments') }}</p>
                                    <h4>{{\App\Models\Comment::count()}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('contacts.index') }}">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-phone highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('contacts_trans.contacts') }}</p>
                                    <h4>{{\App\Models\Contact::count()}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
wrapper -->
        <!--=================================
footer -->
        @include('admin.layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('admin.layouts.footer-scripts')

</body>

</html>
