@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.add_tour_detail_info') }}
@endsection

@section('content')
    <form action="{{ route('tour_detail_infos.store') }}" method="POST">
        @csrf

        <div class="form-group">

            <div class="form-group">
                <label>{{ __('tour_details_trans.tour_details') }}</label>
                <select name="tour_detail_id" class="form-control"  class="m-3">
                    <option value="" class="m-3">{{ __('tour_details_trans.select_tour_detail') }}</option>
                    @foreach($tourDetails as $tour)
                        <option value="{{ $tour->id }}" class="m-3">{{ $tour->getLocalizedTitle(app()->getLocale()) }}</option>
                    @endforeach
                </select>
                @error('tour_detail_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>



        <div class="row">
        <div class="form-group col-md-6">
            <label>{{ __('tour_details_trans.from_month') }}</label>
            <input type="text" name="from_month" class="form-control @error('from_month') is-invalid @enderror" value="{{ old('from_month') }}" required>
            @error('from_month')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label>{{ __('tour_details_trans.to_month') }}</label>
            <input type="text" name="to_month" class="form-control @error('to_month') is-invalid @enderror" value="{{ old('to_month') }}" required>
            @error('to_month')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        </div>
        <div class="form-group">
            <label>{{ __('tour_details_trans.price') }}</label>
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col-md-3">
            <label>{{ __('tour_details_trans.morning') }}</label>
            <textarea name="agenda_morning" class="form-control @error('agenda_morning') is-invalid @enderror">{{ old('agenda_morning') }}</textarea>
            @error('agenda_morning')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

            <div class="form-group col-md-3">
            <label>{{ __('tour_details_trans.noon') }}</label>
            <textarea name="agenda_noon" class="form-control @error('agenda_noon') is-invalid @enderror">{{ old('agenda_noon') }}</textarea>
            @error('agenda_noon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label>{{ __('tour_details_trans.evening') }}</label>
            <textarea name="agenda_evening" class="form-control @error('agenda_evening') is-invalid @enderror">{{ old('agenda_evening') }}</textarea>
            @error('agenda_evening')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{ __('tour_details_trans.submit') }}</button>
    </form>
@endsection
