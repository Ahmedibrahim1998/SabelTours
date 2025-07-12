@extends('admin.layouts.master')

@section('title')
    {{ __('places_trans.place') }} - {{ $place->getLocalizedName(app()->getLocale()) }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ __('places_trans.place_details') }}</h4>
            <a href="{{ route('places.index') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-arrow-left"></i> {{ __('Back') }}
            </a>
        </div>

        <div class="card-body row">

            {{-- الصورة --}}
            @if($place->image)
                <div class="col-md-4 mb-3 text-center">
                    @php
                        $imageSrc = Str::startsWith($place->image, ['http://', 'https://'])
                            ? $place->image
                            : asset('public/' . ltrim($place->image, '/'));
                    @endphp
                    <img src="{{ $imageSrc }}" alt="Place Image" class="img-thumbnail" style="max-height: 250px;">
                </div>
            @endif

            {{-- التفاصيل --}}
            <div class="col-md-8">

                <div class="mb-3">
                    <strong>{{ __('places_trans.name_' . app()->getLocale()) }}:</strong>
                    <p>{{ $place->getLocalizedName(app()->getLocale()) }}</p>
                </div>

                <div class="mb-3">
                    <strong>{{ __('places_trans.short_description_' . app()->getLocale()) }}:</strong>
                    <p>{{ $place->getLocalizedShortDescription(app()->getLocale()) }}</p>
                </div>

                <div class="mb-3">
                    <strong>{{ __('places_trans.governorate') }}:</strong>
                    <p>{{ $place->governorate->getLocalizedName(app()->getLocale()) }}</p>
                </div>

                <div class="mb-3">
                    <strong>{{ __('places_trans.location') }}:</strong>
                    <p>{{ $place->location ?? '-' }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
