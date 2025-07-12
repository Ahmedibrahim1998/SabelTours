@extends('admin.layouts.master')
@section('title')
    {{ trans('place_details_trans.add') }}
@endsection
@section('content')
    <form action="{{ route('place-details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>{{ trans('place_details_trans.select_place') }}</label>
            <select name="place_id" class="form-control">
                <option value="">{{ trans('place_details_trans.select_place') }}</option>
                @foreach($places as $p)
                    <option value="{{ $p->id }}">{{ $p->getLocalizedName(app()->getLocale()) }}</option>
                @endforeach
            </select>
            @error('place_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $loc)
                <div class="col-md-6 form-group">
                    <label>{{ trans('place_details_trans.long_description_'.$loc) }}</label>
                    <textarea name="long_description_{{ $loc }}"
                              class="form-control">{{ old('long_description_'.$loc) }}</textarea>
                    @error('long_description_'.$loc)<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label>{{ trans('place_details_trans.images') }}</label>
            <input type="file" name="images[]" class="form-control" multiple>
            @error('images.*')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">

            <input type="text" name="image_urls" class="form-control"
                   placeholder="{{ trans('place_details_trans.image_urls_placeholder') }}"
                   value="{{ old('image_urls') }}">
        </div>
        <button class="btn btn-success">{{ trans('place_details_trans.submit') }}</button>
    </form>
@endsection
