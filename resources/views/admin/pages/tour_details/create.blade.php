@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.add_tour_detail') }}
@endsection

@section('content')
    <form action="{{ route('tour_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>{{ __('tour_details_trans.tour') }}</label>
            <select name="tour_id" class="form-control @error('tour_id') is-invalid @enderror" required>
                <option value="">{{ __('tour_details_trans.select_tour') }}</option>
                @foreach ($tours as $tour)
                    <option value="{{ $tour->id }}">{{ $tour->getLocalizedName(app()->getLocale()) }}</option>
                @endforeach
            </select>
            @error('tour_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.sub_tour') }}</label>
            <select name="sub_tour_id" class="form-control @error('sub_tour_id') is-invalid @enderror">
                <option value="">{{ __('tour_details_trans.select_sub_tour') }}</option>
                @foreach ($subTours as $sub)
                    <option value="{{ $sub->id }}" {{ old('sub_tour_id') == $sub->id ? 'selected' : '' }}>
                        {{ $sub->getLocalizedName(app()->getLocale()) }}
                    </option>
                @endforeach
            </select>
            @error('sub_tour_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.image') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('tour_details_trans.title_' . $locale) }}</label>
                    <input type="text" name="title_{{ $locale }}" class="form-control" value="{{ old('title' . $locale) }}">
                    @error('title_' . $locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>

        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('tour_details_trans.description_' . $locale) }}</label>
                    <input type="text" name="description_{{ $locale }}" class="form-control" value="{{ old('description' . $locale) }}">
                    @error('description_' . $locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>

        <div class="row mt-3">
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('tour_details_trans.location_' . $locale) }}</label>
                    <input type="text" name="location_{{ $locale }}" value="{{ old('location_' . $locale) }}" class="form-control">
                    @error('location_' . $locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{ __('tour_details_trans.submit') }}</button>
    </form>
@endsection
