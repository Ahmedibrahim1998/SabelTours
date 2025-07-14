@extends('admin.layouts.master')

@section('title', __('section_details_trans.section_details') . ' - ' . ($sectionDetail->title ?? ''))

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('section-details.index') }}" class="btn btn-light btn-sm">
                <i class="fa fa-arrow-left"></i> {{ __('section_details_trans.back') }}
            </a>
        </div>

        <div class="card-body">
            {{-- Title --}}
            <h5>{{ __('section_details_trans.title') }}</h5>
            <p>{{ $sectionDetail->title ?? '-' }}</p>

            {{-- Linked Section --}}
            <h5>{{ __('section_details_trans.select_section') }}</h5>
            <p>{{ $sectionDetail->section?->getLocalizedName(app()->getLocale()) ?? '-' }}</p>

            {{-- Multilingual Content --}}
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <h5>{{ __('section_details_trans.content_' . $locale) }}</h5>
                <p>{{ $sectionDetail->getLocalizedContent($locale) }}</p>
            @endforeach

            {{-- Main Image --}}
            <h5>{{ __('section_details_trans.image') }}</h5>
            @if($sectionDetail->image && file_exists(public_path($sectionDetail->image)))
                <img src="{{ asset($sectionDetail->image) }}" height="200" class="img-thumbnail mb-3">
            @else
                <p class="text-muted">{{ __('section_details_trans.no_image') }}</p>
            @endif

            {{-- Multiple Images --}}
            <h5>{{ __('section_details_trans.images') }}</h5>
            @php $images = $sectionDetail->getImages(); @endphp
            @if(count($images))
                @foreach($images as $img)
                    <img src="{{ asset($img) }}" height="100" class="mr-2 mb-2 img-thumbnail">
                @endforeach
            @else
                <p class="text-muted">{{ __('section_details_trans.no_images') }}</p>
            @endif
        </div>
    </div>
@endsection
