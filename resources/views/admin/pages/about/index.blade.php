@extends('admin.layouts.master')
@section('title') {{ __('about_us_trans.about_us') }} @endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>{{ __('about_us_trans.about_us') }}</h5>
            <a href="{{ route('about-us.edit', $about->id ?? '') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> {{ __('about_us_trans.edit') }}
            </a>
        </div>

        <div class="card-body">

            {{-- Team Name --}}
            <h5>{{ __('about_us_trans.team_name') }}</h5>
            <p>{{ $about->team_name }}</p>

            {{-- About Text --}}
            <h5>{{ __('about_us_trans.about_text_' . app()->getLocale()) }}</h5>
            <p>{{ $about->getLocalizedField('about_text') }}</p>

            {{-- Goals --}}
            <h5>{{ __('about_us_trans.goals_' . app()->getLocale()) }}</h5>
            <p>{{ $about->getLocalizedField('goals') }}</p>

            {{-- Images --}}
            @if($about->getImages())
                <h5>{{ __('about_us_trans.images') }}</h5>
                <div class="d-flex flex-wrap">
                    @foreach($about->getImages() as $img)
                        <img src="{{ asset('public/' . ltrim($img, '/')) }}" height="100" class="mr-2 mb-2 rounded border">
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection
