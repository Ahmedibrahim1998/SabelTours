<!--=================================
 header start-->

<nav class="admin-header navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper fw-600">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/images.jpeg') }}" alt="Sable d'Égypte " style="height:50px; width:250px;">
        </a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li>
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
               href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value=""
                           name="search">
                    <button class="search-button" type="submit"><i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                @php
                    $locale = App::getLocale();
                    $flags = [
                        'ar' => 'eg', // علم مصر بدلاً من السعودية
                        'en' => 'gb', // علم بريطانيا
                        'fr' => 'fr',
                        'de' => 'de',
                        'it' => 'it',
                        'es' => 'es'
                    ];
                @endphp
                {{ LaravelLocalization::getCurrentLocaleName() }}
                @if(isset($flags[$locale]))
                    <img src="https://flagcdn.com/24x18/{{ $flags[$locale] }}.png" alt="{{ $locale }}" width="24" height="18">
                @endif
            </button>

            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item d-flex align-items-center gap-2"
                       rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        @if(isset($flags[$localeCode]))
                            <img src="https://flagcdn.com/24x18/{{ $flags[$localeCode] }}.png" alt="{{ $localeCode }}"
                                 width="24" height="18" class="me-2 mr-1">
                        @endif
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>


        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                    <img src="{{env('APP_URL').'public/assets/images/faces/6.jpg'}}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out text-info"></i>Logout</a>
                <form id="logout-form" action="{{route('dashboard')}}" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<!--================================= header End-->
