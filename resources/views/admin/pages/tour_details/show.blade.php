@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.tour_details') }}
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ __('tour_details_trans.tour_details') }} #{{ $tourDetail->id }}</h4>
            <a href="{{ route('tour_details.index') }}" class="btn btn-light btn-sm">
                <i class="fa fa-arrow-left"></i> {{ __('tours_trans.back') }}
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.tour') }}</h6>
                    <p>{{ $tourDetail->tour->getLocalizedName(app()->getLocale()) ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.sub_tour') }}</h6>
                    <p>{{ optional($tourDetail->subTour)->getLocalizedName(app()->getLocale()) ?? '-' }}</p>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">{{ __('tour_details_trans.title') }}</h6>
                <ul class="list-group">
                    @foreach($tourDetail->title as $lang => $value)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>{{ strtoupper($lang) }}:</strong> {{ $value }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">{{ __('tour_details_trans.description') }}</h6>
                <ul class="list-group">
                    @foreach($tourDetail->description as $lang => $value)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>{{ strtoupper($lang) }}:</strong> {{ $value }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">{{ __('tour_details_trans.image') }}</h6>
                @php
                    $imageSrc = Illuminate\Support\Str::startsWith($tourDetail->image, ['http://', 'https://'])
                        ? $tourDetail->image
                        : asset('public/' . ltrim($tourDetail->image, '/'));
                @endphp
                <img src="{{ $imageSrc }}" class="img-fluid rounded shadow-sm" width="300" alt="Tour Detail Image">
            </div>

            @if($tourDetail->location)
                <div class="mb-4">
                    <h6 class="text-muted">{{ __('tour_details_trans.location') }}</h6>
                    @if(is_array($tourDetail->location))
                        <ul class="list-group">
                            @foreach($tourDetail->location as $lang => $value)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>{{ strtoupper($lang) }}:</strong> {{ $value }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>{{ $tourDetail->location }}</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
