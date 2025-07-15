@extends('admin.layouts.master')

@section('title')
    {{ trans('tours_trans.tour_details') }}
@endsection

@section('content')
    <div class="card card-statistics h-100">
        <div class="card-body">
            <h4>{{ __('tours_trans.name_' . app()->getLocale()) }}:</h4>
            <p>{{ $tour->getLocalizedName(app()->getLocale()) }}</p>

            <h4>{{ __('tours_trans.description_' . app()->getLocale()) }}:</h4>
            <p>{{ $tour->getLocalizedDescription(app()->getLocale()) }}</p>

            <h4>{{ __('tours_trans.type') }}:</h4>
            <p>{{ ucfirst($tour->type) }}</p>

            <h4>{{ __('tours_trans.image') }}:</h4>
            @php
                $imgSrc = Str::startsWith($tour->image, ['http', 'https']) ? $tour->image : asset('public/' . $tour->image);
            @endphp
            <img src="{{ $imgSrc }}" height="100">

            <h4 class="mt-3">{{ __('tours_trans.gallery') }}:</h4>
            <div class="d-flex flex-wrap">
                @foreach($tour->getGalleryImages() ?? [] as $img)
                    <img src="{{ Str::startsWith($img, ['http', 'https']) ? $img : asset('public/' . $img) }}"
                         height="70" class="m-1">
                @endforeach
            </div>

            <a href="{{ route('tours.index') }}" class="btn btn-secondary mt-3">{{ __('tours_trans.back') }}</a>
        </div>
    </div>
@endsection
