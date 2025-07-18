<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @include('admin.layouts.head')
</head>

<body @if (App::getLocale() == 'ar') style="font-family: 'Cairo', sans-serif;" @else style="font-family: 'Almarai', sans-serif;" @endif>

<div class="wrapper">

    <!--=================================
preloader -->

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

    @yield('page-header')

    @yield('content')

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
