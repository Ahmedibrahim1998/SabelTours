@extends('admin.layouts.master')

@section('title')
    {{ __('sub_tours_trans.sub_tours') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('sub_tours_trans.sub_tours') }} #{{ $subTour->id }}</h5>
                    <a href="{{ route('sub-tours.index') }}" class="btn btn-light btn-sm">{{ __('tours_trans.back') }}</a>
                </div>
                <div class="card-body">

                    {{-- الرحلة الرئيسية --}}
                    <div class="mb-4">
                        <h6 class="text-muted">{{ __('sub_tours_trans.tour') }}</h6>
                        <p class="lead">{{ $subTour->tour->getLocalizedName(app()->getLocale()) ?? '-' }}</p>
                    </div>

                    {{-- الأسماء بجميع اللغات --}}
                    <div class="mb-4">
                        <h6 class="text-muted">{{ __('sub_tours_trans.name_' . app()->getLocale()) }}</h6>
                        <div class="row">
                            @foreach($subTour->name as $lang => $value)
                                <div class="col-md-4 mb-2">
                                    <div class="border rounded p-2 bg-light">
                                        <strong>{{ strtoupper($lang) }}:</strong> {{ $value }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- الصورة --}}
                    <div class="mb-4">
                        <h6 class="text-muted">{{ __('sub_tours_trans.image') }}</h6>
                        @if($subTour->image)
                            @php
                                $imageSrc = Illuminate\Support\Str::startsWith($subTour->image, ['http://', 'https://'])
                                    ? $subTour->image
                                    : asset('public/' . ltrim($subTour->image, '/'));
                            @endphp
                            <img src="{{ $imageSrc }}" class="img-fluid rounded shadow-sm" alt="Sub Tour Image" style="max-height: 300px;">
                        @else
                            <p class="text-muted">-</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
