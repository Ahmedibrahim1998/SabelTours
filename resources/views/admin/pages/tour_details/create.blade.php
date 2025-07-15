@extends('admin.layouts.master')
@section('title') {{ __('tour_details_trans.add_tour_detail') }} @endsection
@section('content')
    <form action="{{ route('tour_details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>{{ __('tour_details_trans.tour') }}</label>
                <select name="tour_id" class="form-control" required>
                    <option value="">{{ __('tour_details_trans.select_tour') }}</option>
                    @foreach($tours as $tour)
                        <option value="{{ $tour->id }}">{{ $tour->getLocalizedName(app()->getLocale()) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label>{{ __('tour_details_trans.sub_tour') }}</label>
                <select name="sub_tour_id" class="form-control">
                    <option value="">{{ __('tour_details_trans.select_sub_tour') }}</option>
                    @foreach($subTours as $sub)
                        <option value="{{ $sub->id }}">{{ $sub->getLocalizedName(app()->getLocale()) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>

        <div class="form-group">
            <label>{{ __('tour_details_trans.image') }}</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $lang)
                <div class="col-md-6">
                    <label>{{ __('tour_details_trans.description_' . $lang) }}</label>
                    <textarea name="description_{{ $lang }}" class="form-control" rows="3"></textarea>
                </div>
            @endforeach
        </div>

        <br>

        <div class="form-group">
            <label>{{ __('tour_details_trans.rate') }}</label>
            <input type="number" name="rate" class="form-control" min="1" max="5">
        </div>

        <div class="row">
            @foreach(['morning','noon','evening'] as $time)
                <div class="col-md-4">
                    <label>{{ __('tour_details_trans.' . $time) }}</label>
                    <textarea name="agenda[{{ $time }}][text]" class="form-control"></textarea>
                </div>
            @endforeach
        </div>

        <br>

        <div class="row">
            <div class="col-md-6">
                <label>{{ __('tour_details_trans.from_month') }}</label>
                <input type="text" name="from_month" class="form-control">
            </div>
            <div class="col-md-6">
                <label>{{ __('tour_details_trans.to_month') }}</label>
                <input type="text" name="to_month" class="form-control">
            </div>
        </div>

        <br>

        <div class="form-group">
            <label>{{ __('tour_details_trans.price') }}</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.location') }}</label>
            <input type="text" name="location" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('tour_details_trans.submit') }}</button>
    </form>
@endsection
