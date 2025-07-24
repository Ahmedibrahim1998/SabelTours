@extends('admin.layouts.master')

@section('title') {{ __('tour_details_trans.edit_tour_detail') }} @endsection

@section('content')
    <form action="{{ route('tour_details.update', $tourDetail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label>{{ __('tour_details_trans.tour') }}</label>
                <select name="tour_id" class="form-control" required>
                    @foreach($tours as $tour)
                        <option value="{{ $tour->id }}" {{ $tour->id == $tourDetail->tour_id ? 'selected' : '' }}>
                            {{ $tour->getLocalizedName(app()->getLocale()) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label>{{ __('tour_details_trans.sub_tour') }}</label>
                <select name="sub_tour_id" class="form-control">
                    <option value="">{{ __('tour_details_trans.select_sub_tour') }}</option>
                    @foreach($subTours as $sub)
                        <option value="{{ $sub->id }}" {{ $sub->id == $tourDetail->sub_tour_id ? 'selected' : '' }}>
                            {{ $sub->getLocalizedName(app()->getLocale()) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>

        <div class="form-group">
            <label>{{ __('tour_details_trans.image') }}</label>
            <input type="file" name="image" class="form-control">
            @if($tourDetail->image)
                <img src="{{ asset('public/' . $tourDetail->image) }}" width="100" class="mt-2">
            @endif
        </div>



        <br>

        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('tour_details_trans.title_' . $locale) }}</label>
                    <input type="text" name="title_{{ $locale }}" class="form-control" value="{{ $tourDetail->title[$locale] ?? '' }}">
                    @error('title_' . $locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>

        <br>

        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('tour_details_trans.description_' . $locale) }}</label>
                    <input type="text" name="description_{{ $locale }}" class="form-control" value="{{ $tourDetail->description[$locale] ?? '' }}">
                    @error('description_' . $locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>

        <br>

        <div class="form-group">
            <label>{{ __('tour_details_trans.location') }}</label>
            <input type="text" name="location" class="form-control" value="{{ $tourDetail->location }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('tour_details_trans.update') }}</button>
    </form>
@endsection
