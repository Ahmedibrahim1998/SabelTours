@extends('admin.layouts.master')

@section('title')
    {{ trans('places_trans.add_place') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- اختيار المحافظة --}}
                        <div class="form-group">
                            <label>{{ trans('places_trans.governorate') }}</label>
                            <select name="governorate_id" class="form-control" required>
                                <option value="">{{ trans('places_trans.select_governorate') }}</option>
                                @foreach($governorates as $governorate)
                                    <option value="{{ $governorate->id }}">{{ $governorate->getLocalizedName(app()->getLocale()) }}</option>
                                @endforeach
                            </select>
                            @error('governorate_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- أسماء المكان بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('places_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ old('name_' . $locale) }}">
                                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- وصف مختصر بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('places_trans.short_description_' . $locale) }}</label>
                                    <textarea name="short_description_{{ $locale }}" class="form-control" rows="3">{{ old('short_description_' . $locale) }}</textarea>
                                    @error('short_description_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- الموقع الجغرافي --}}
                        <div class="form-group">
                            <label>{{ __('places_trans.location') }}</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                            @error('location')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- صورة --}}
                        <div class="form-group">
                            <label>{{ __('places_trans.image') }}</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- أو رابط صورة خارجي --}}
                        <div class="form-group">
                            <label>{{ __('places_trans.image_url') }}</label>
                            <input type="text" name="image_url" class="form-control" value="{{ old('image_url') }}">
                            @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ trans('places_trans.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
