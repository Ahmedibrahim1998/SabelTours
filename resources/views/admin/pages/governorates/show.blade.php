@extends('admin.layouts.master')

@section('title')
    {{ trans('governorates_trans.governorates') }} - {{ $governorate->getLocalizedName(app()->getLocale()) }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center font-weight-bold">
            <div class="col-md-10">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-map-marker-alt"></i> {{ trans('governorates_trans.governorates') }}
                        </h5>
                        <a href="{{ route('governorates.index') }}" class="btn btn-light btn-sm">
                            <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                    <div class="card-body">

                        {{-- الصورة --}}
                        <div class="mb-4 text-center">
                            @php
                                $imageSrc = Illuminate\Support\Str::startsWith($governorate->image, ['http://', 'https://'])
                                    ? $governorate->image
                                    : asset('public/' . ltrim($governorate->image, '/'));
                            @endphp
                            @if($governorate->image)
                                <img src="{{ $imageSrc }}" height="200" class="img-thumbnail rounded mb-3" alt="Governorate Image">
                            @else
                                <p class="text-muted">-</p>
                            @endif
                        </div>

                        {{-- Tabs للغات المختلفة --}}
                        <div class="mb-4">
                            <ul class="nav nav-tabs mb-3" id="localeTabs" role="tablist">
                                @foreach(['ar','es','en','fr','it','de'] as $locale)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if(app()->getLocale() === $locale) active @endif"
                                           id="{{ $locale }}-tab"
                                           data-toggle="tab"
                                           href="#locale-{{ $locale }}"
                                           role="tab"
                                           aria-controls="locale-{{ $locale }}"
                                           aria-selected="{{ app()->getLocale() === $locale ? 'true' : 'false' }}">
                                            {{ strtoupper($locale) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" id="localeTabContent">
                                @foreach(['ar','es','en','fr','it','de'] as $locale)
                                    <div class="tab-pane fade @if(app()->getLocale() === $locale) show active @endif"
                                         id="locale-{{ $locale }}"
                                         role="tabpanel"
                                         aria-labelledby="{{ $locale }}-tab">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-muted">{{ trans('governorates_trans.name_' . $locale) }}</h6>
                                                <p class="text-dark">{{ $governorate->name[$locale] ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- عدد الأماكن --}}
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-muted">{{ trans('governorates_trans.places_count') }}</h6>
                                <p class="text-dark">{{ $governorate->places_count }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
